<?php

namespace App\Http\Controllers;

use App\Mail\AdPackageRenewMail;
use Illuminate\Support\Facades\Mail;
use App\Models\{AdPost,AdImage,Keyword,Package,FeaturePackage,StripeKey};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index(){

        $ads = AdPost::latest()->get();

        return view('admin.ads.index',compact('ads'));
    }

    public function delete($id){
        $ad = AdPost::find($id);
        $ad->delete();
        return back()->withErrors('Ad Deleted Successfully !');
    }

    public function editAd($id){
        $ad = AdPost::find($id)->first();
        return view('frontend.ad.edit', compact('ad'));
    }

    public function updateAd(Request $request, $id){
        $ad = AdPost::where('id',$id)->first();
        $update = $ad->update([
            'ad_title' => $request->ad_title,
            'price' => $request->price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
        ]);

        if($request->keywords){
            foreach($request->keywords as $keyword){
               $keys = explode(',', $keyword);
               foreach($keys as $key){
                Keyword::create([
                    'ad_id'     => $ad->id,
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
                 'ad_id'     => $ad->id,
                 'ad_images' => $fileName,
              ]);
            }
         }

         if(!$update)
         {
            return back()->withErrors('Something Wrong !');
         }else{
            return redirect()->route('ad.details', $ad->id)->withSuccess('Your Post Updated !');
         }

    }

    public function renewAd($id)
    {
        
        $updatedPost = AdPost::find($id);
        $packages = Package::all();

        return view('frontend.ad.renewPackage', compact('updatedPost', 'packages'));

    }

    public function updateAdPackage(Request $request, $id)
    {
        $updatedPost = AdPost::find($id);
        $updatedPost->update([
            'created_at' => \Carbon\Carbon::now(),
        ]);

        $price =Package::find($updatedPost->package_id)->package_price;
        $stripeKey = StripeKey::first();
        \Stripe\Stripe::setApiKey($stripeKey->key);

        $intent = \Stripe\PaymentIntent::create([
            'amount' => ($price)*100,
            'currency' => 'USD',
            'metadata' => ['integration_check'=>'accept_a_payment']
        ]);

        $user = Auth::user();

        $data = array(
            'id' => $updatedPost->id,
            'name'=> $user->name,
            'email'=> $user->email,
            'amount'=> $price,
            'client_secret'=> $intent->client_secret,
        );

        Mail::to($user->email)->send(new AdPackageRenewMail($data));

        return view('frontend.pages.updatePackageStripe',['data'=> $data, 'stripeKey' => StripeKey::first()]);

    }

    public function adFeature($id)
    {
        
        $updatedPost = AdPost::find($id);
        $features = FeaturePackage::all();
        // dd($features);

        return view('frontend.ad.renewFeature', compact('updatedPost', 'features'));

    }

    public function updateAdFeature(Request $request, $id)
    {
        $updatedPost = AdPost::find($id);
        AdPost::find($id)->update([
            'featured_id' => $request->feature_id,
        ]);
        $featurePrice = FeaturePackage::where('id', $request->feature_id)->first()->featured_price;
        $price =Package::find($updatedPost->package_id)->package_price;
        $stripeKey = StripeKey::first();
        \Stripe\Stripe::setApiKey($stripeKey->key);

        $intent = \Stripe\PaymentIntent::create([
            'amount' => ($featurePrice)*100,
            'currency' => 'USD',
            'metadata' => ['integration_check'=>'accept_a_payment']
        ]);

        $user = Auth::user();

        $data = array(
            'id' => $updatedPost->id,
            'name'=> $user->name,
            'email'=> $user->email,
            'amount'=> $price,
            'client_secret'=> $intent->client_secret,
        );

        return view('frontend.pages.updateFeatureStripe',['data'=> $data, 'stripeKey' => StripeKey::first()]);

    }
}
