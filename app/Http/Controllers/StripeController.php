<?php

namespace App\Http\Controllers;

use Auth;
use Stripe;
use Session;
use Carbon\Carbon;
use App\Models\{AdPost,StripeKey,AdImage,FeaturePackage,Keyword,Package};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('frontend.pages.ad-posts-page');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $stripeKey = StripeKey::first();
        \Stripe\Stripe::setApiKey($stripeKey->key);
        $request->validate([
            'ad_title'      => 'required|string',
            'price'         => 'required|numeric',
            'category_id'   => 'required',
            'package_id'    => 'required',
            'short_desc'    => 'required',
            'long_desc'     => 'required',
            'address'       => 'required|string',
            'ad_images'     => 'required',
            'country_id'    => 'required',
            'phone'         => 'required',
            // 'website'       => 'url'

        ]);
        $packageDay  = Package::find($request->package_id)->days;
        if($request->featured_id){
            $featuredDay = Carbon::now()->addDays(FeaturePackage::find($request->featured_id)->featured_days);
        }else{
            $featuredDay = null;
        }

        $product_price = Package::find($request->package_id)->package_price;
        $featurePrice = FeaturePackage::where('id', $request->featured_id)->first()->featured_price ?? 0;
        $totalPrice = $featurePrice + $product_price;

        $adPost = AdPost::create([
            'user_id'       => Auth::id(),
            'ad_title'      => $request->ad_title,
            'price'         => $request->price,
            'category_id'   => $request->category_id,
            'package_id'    => $request->package_id,
            'ad_type'       => $request->ad_type ?? null,
            'short_desc'    => $request->short_desc,
            'long_desc'     => $request->long_desc,
            'address'       => $request->address,
            'country_id'    => $request->country_id ?? null,
            'product_location' => $request->product_location ?? null,
            'phone'            => $request->phone,
            'website'          => $request->website ?? null ,
            'property_id'      => '#'.uniqid(),
            'featured_id'      => $request->featured_id ?? null,
            'expiry_date'      => Carbon::now()->addDays($packageDay),
            'featured_expiry_date'  => $featuredDay,
        ]);

        if($request->keywords){
            foreach($request->keywords as $keyword){
               $keys = explode(',', $keyword);
               foreach($keys as $key){
                Keyword::create([
                    'ad_id'     => $adPost->id,
                    'keyword' => $key
                ]);
               }
            }
        }

        if($request->file('ad_images')){
            foreach($request->file('ad_images') as $image){
              $fileName = uniqid().'-'.rand().'.'.$image->extension();
              $location = public_path('uploads/adImages');
              $image->move($location, $fileName);
              AdImage::create([
                 'ad_id'     => $adPost->id,
                 'ad_images' => $fileName,
              ]);
            }
         }


        $intent = \Stripe\PaymentIntent::create([
                'amount' => ($adPost->price)*100,
                'currency' => 'USD',
                'metadata' => ['integration_check'=>'accept_a_payment']
        ]);

        $user = Auth::user();

        $data = array(
            'id' => $adPost->id,
            'name'=> $user->name,
            'email'=> $user->email,
            'amount'=> $totalPrice,
            'client_secret'=> $intent->client_secret,
            'trans_id'=> $intent->id,
        );

     return view('frontend.pages.stripe',['data'=> $data, 'stripeKey' => StripeKey::first()]);

        // return back()->withSuccess('Ad Created Successfully');

    }

    public function success($id, $trans_id)
    {
        $update = AdPost::find($id)->update(['status' => '1']);
        $id = AdPost::find($id);
        $amount = Package::where('id', $id->package_id)->first()->package_price;
        if($id->featured_id){
            $featurePrice = FeaturePackage::where('id', $id->featured_id)->first()->featured_price;
            $amount += $featurePrice;
        }

        $this->createTransaction(FacadesAuth::user()->id, $id->id, $amount, 'create', 'Paid', $trans_id);
        if($update){
            return redirect()->route('ad.details', $id)->withSuccess('Your post is now Live !');
        }else{
            new NotFoundHttpException();
        }


    }

    public function updateFeatureSuccess($id)
    {
        $id = AdPost::find($id);
        $amount = FeaturePackage::where('id', $id->featured_id)->first()->featured_price;
        $this->createTransaction(FacadesAuth::user()->id, $id->id, $amount, 'featured', 'Paid', uniqid());
        return redirect()->route('ad.details', $id)->withSuccess('Payment Completed !');
    }

    public function updatePackageSuccess($id)
    {
        $id = AdPost::find($id);
        $amount = Package::where('id', $id->package_id)->first()->package_price;
        $this->createTransaction(FacadesAuth::user()->id, $id->id, $amount, 'renew', 'Paid', uniqid());
        return redirect()->route('ad.details', $id)->withSuccess('Payment Completed !');
    }

}
