<?php

namespace App\Http\Controllers;

// App Model are going here ..
use App\Models\{Tag,User,Blogs,Title,AdPost,AdTips,AdTerms,Contact,Country,Package,Category,AdBenefit,AdBenefits,Subscriber,AboutBanner,BlogComment,Testimonial,AboutFeature, AdCategory, AdSubCategory, BlogCategory,GueatMessage,FeaturePackage,DirectoryCategory};

use Illuminate\Support\Str;
use App\Mail\SubscribeMail;
use Illuminate\Http\Request;
use App\Http\Requests\{ContactUpdateRequest,TitleUpdateRequest,AboutFeatureUpdateRequest};
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FrontendController extends Controller
{

    public function index()
    {
        return view('frontend/pages/home-page', [
            'categories'    => Category::latest()->take(6)->get(),
            'homeCategories'=> Category::all(),
            'titles'        => Title::first(),
            'testimonials'  => Testimonial::orderBy('created_at', 'desc')->get(),
            'blogs'         => Blogs::orderBy('created_at', 'desc')->get(),
            'ads'           => AdPost::where('status', 1)->where('expiry_date', '>=', Carbon::now())->latest()->get(),
            'countries'     => Country::all(),
            'featuredAds'   => AdPost::where('status', 1)->whereNotNull('featured_id')->where('featured_expiry_date' , '>=' , Carbon::now())->latest()->get(),
            'countries'     => Country::all(),
            'adCategories'  => AdCategory::all()->except(1),
            'directoryCategories'  => DirectoryCategory::all(),
        ]);
    }

    public function adCategories($id)
    {
        $subCat = AdSubCategory::where('category_id', $id)->get();
        return view('frontend.pages.adCategories', compact('id'));
    }

    public function postAd($id)
    {
        if($id == 2){
            $subCategories = AdSubCategory::where('category_id', $id)->get();
            return view('frontend.pages.ad.rentalAd', compact('subCategories','id'));
        }elseif($id == 3){
            $subCategories = AdSubCategory::where('category_id', $id)->get();
            return view('frontend.pages.ad.localServiceAd', compact('subCategories','id'));
        }elseif($id == 4){
            $subCategories = AdSubCategory::where('category_id', $id)->get();
            return view('frontend.pages.ad.carsAd', compact('subCategories','id'));
        }elseif($id == 5){
            $subCategories = AdSubCategory::where('category_id', $id)->get();
            return view('frontend.pages.ad.buySellTradeAd', compact('subCategories','id'));
        }elseif($id == 6){
            $subCategories = AdSubCategory::where('category_id', $id)->get();
            return view('frontend.pages.ad.entertainmentTravelAd', compact('subCategories','id'));
        }elseif($id == 7) {
            $subCategories = AdSubCategory::where('category_id', $id)->get();
            return view('frontend.pages.ad.armenianConnectAd', compact('subCategories','id'));
        }
    }

    public function about()
    {
        return view('frontend/pages/about-page', [
            'banner' => AboutBanner::first(),
            'title' => Title::first(),
            'feature' => AboutFeature::first(),
        ]);
    }

    public function blogs()
    {
        $blogs = Blogs::orderBy('created_at', 'desc')->paginate(4);
        $blogCategories = BlogCategory::all();
        $blogAuthors = Blogs::pluck('user_id');
        $users = User::whereIn('id', $blogAuthors)->get();
        $tags = Tag::all();
        return view('frontend/pages/blogs-page', compact('blogs', 'blogCategories', 'users', 'tags'));
    }

    public function categoryWiseBlogs($id){
        $category = BlogCategory::find($id);
        $blogCategories = BlogCategory::all();
        $blogs = Blogs::where('category_id', $id)->latest()->paginate(4);
        $blogAuthors = Blogs::pluck('user_id');
        $users = User::whereIn('id', $blogAuthors)->get();
        $tags = Tag::all();
        return view('frontend/pages/category-blogs-page', compact('category','blogCategories','blogs', 'users', 'tags'));
    }

    public function tagWiseBlogs($id){
        $tag = Tag::find($id);
        $blogs = $tag->blogs()->latest()->paginate(4);
        $blogCategories = BlogCategory::all();
        $blogAuthors = Blogs::pluck('user_id');
        $users = User::whereIn('id', $blogAuthors)->get();
        $tags = Tag::all();
        return view('frontend/pages/blogs-page', compact('blogs', 'blogCategories', 'users', 'tags'));
    }

    public function authorWiseBlogs($id){

        $blogCategories = BlogCategory::all();
        $blogs = Blogs::where('user_id', $id)->latest()->paginate(4);
        $blogAuthors = Blogs::pluck('user_id');
        $users = User::whereIn('id', $blogAuthors)->get();
        $tags = Tag::all();
        return view('frontend/pages/blogs-page', compact('blogCategories','blogs', 'users', 'tags'));
    }

    public function blogDetails($slug)
    {
        $singleBlog = Blogs::where('slug', $slug)->first();
        $blogCategories = BlogCategory::all();

        $comment = Blogs::where('slug', $slug)->first();
        $blogComments = BlogComment::where('blog_id', $comment->id)->get();
        $blogAuthors = Blogs::pluck('user_id');
        $users = User::whereIn('id', $blogAuthors)->get();
        return view('frontend/pages/blog-details-page', compact('singleBlog', 'blogCategories', 'blogComments', 'users'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('frontend/pages/contact-page', compact('contact'));
    }

    public function adPosts()
    {
        return view('frontend/pages/ad-posts-page',[
            'categories' => Category::all(),
            'packages'=>Package::all(),
            'countries' => Country::all(),
            'terms' => AdTerms::all(),
            'tips' => AdTips::all(),
            'benefits' => AdBenefit::all(),
            'featurePackages' => FeaturePackage::all(),
        ]);
    }

    public function showCategories(){
        $categories = Category::all();
        $titles = Title::first();
        return view('frontend.pages.all-categories',compact('categories', 'titles'));
    }

    public function titleIndex()
    {
        $titles = Title::first();
        return view('admin.title.index', compact('titles'));
    }
    public function titleUpdate(TitleUpdateRequest $request, $id)
    {
        $update = Title::find($id)->update($request->all());
        if(!$update){
            return back()->with('error', 'Something goess Wrong !');
        }
        return back()->with('success', 'Title Update Success !');
    }
    public function subscribeMail(Request $request)
    {
        $request->validate([
            'email' => 'email|required|unique:subscribers'
        ]);

        $add = Subscriber::create($request->except('_token', '_method') + [
            'email' => $request->email,
            'token' => Str::random(),
        ]);

        // $url = URL::signedRoute('unsubscribe', ['user' => $add->id]);

        // return $url;

        $mailData = [
            'email' => $add->email,
            'token' => $add->token,
            'title' => 'Mail from Classified',
            'body' => 'This is for Subscribe mail.'
        ];

        Mail::to($request->email)->send(new SubscribeMail($mailData));

        if(!$add){
            return response()->json(['message' => 'Duplicate Entry !']);
            // new NotFoundHttpException();
        }else{
            return response()->json(['message' => 'Subscribed !']);
        }
    }


    // public function unsubscribe($user)
    // {
    //     $subscribe = Subscriber::find($user)->first();
    //     $subscribe->delete();

    //     return redirect()->route('home.page')->with('error','You are unsubscribe from our email services !!');
    //     return $user;
    // }

    public function unsubscribeMail($email, $token)
    {
        $subscribe = Subscriber::where('email', $email)->first();

        if ($subscribe && $subscribe->token === $token) {
            $subscribe->delete();
        }else{
            return back()->withErrors('I Think, your token is Mismatch !!');
        }

        return redirect()->route('home.page')->with('error','You are unsubscribe from our email services !!');
    }

    public function contactInfo()
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function contactUpdate(ContactUpdateRequest $request, $id)
    {

       $contact = Contact::find($id)->update($request->except('_token', '_method') + [
        'title' => $request->title,
        'sub_title' => $request->sub_title,
        'phone' => $request->phone,
        'working_hour' => $request->working_hour,
        'email' => $request->email,
       ]);

       if(!$contact){
        return back()->with('error', 'Something Wrong !');
       }else{
        return back()->with('success', 'Contact Info Updates Success !');
       }
    }

    public function aboutDetailsIndex()
    {
        $abouts = AboutBanner::first();
        return view('admin.about.details.index', compact('abouts'));
    }

    public function aboutDetailsUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $bannerData = AboutBanner::find($id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
        ]);

        if(!$bannerData){
            return back()->with('error', 'Something Wrong !');
        }else{
            return back()->with('success', 'Banner Information Updates Success !');
        }
    }

    public function aboutFeature()
    {
        $feature = AboutFeature::first();
        return view('admin.about.feature', compact('feature'));
    }

    public function aboutFeatureUpdate(AboutFeatureUpdateRequest $request, $id)
    {
       $success = AboutFeature::find($id)->update($request->all());

        if(!$success){
        return back()->with('error', 'Something Wrong !');
        }else{
            return back()->with('success', 'Banner Information Updates Success !');
        }
    }

    public function guestMessages(Request $request)
    {
        $success = GueatMessage::create($request->all());

        if(!$success){
            return back()->with('error', 'Something Wrong !');
        }
        return back()->with('success', 'Thanks for message us ! we will contact with you soon !!');
    }

    public function blogSearch(Request $request)
    {
        $search_value = $request->search_value;
        $blogs  = Blogs::where('title','LIKE','%'.$search_value.'%')->get();
        $view  = view('frontend.include.blog', compact('blogs'))->render();
        return response()->json(['searchData' => $view]);
    }

    public function blogSearchByCategroy(Request $request)
    {
        $blogs  = Blogs::where('category_id','LIKE','%'.$request->id.'%')->get();
        $view  = view('frontend.include.blog', compact('blogs'))->render();
        return response()->json(['searchData' => $view]);
    }

    public function blogSearchByAuthor(Request $request)
    {
        $blogs  = Blogs::where('user_id','LIKE','%'.$request->id.'%')->get();
        $view  = view('frontend.include.blog', compact('blogs'))->render();
        return response()->json(['searchData' => $view]);
    }

    public function blogSearchByTag(Request $request)
    {
        $tag  = Tag::where('id',$request->id)->first();
        $blogs  = $tag->blogs;
        $view  = view('frontend.include.blog', compact('blogs'))->render();
        return response()->json(['searchData' => $view]);
    }


    public function categorySearch(Request $request, $id)
    {
        $category = Category::find($id);
        $categories = Category::all();

        if($request->country_id){
            $posts = AdPost::where('category_id', $id)
                            ->where('ad_title','like','%'.$request->category.'%')
                            ->where('country_id', $request->country_id)
                            ->where('expiry_date', '>=', Carbon::now())
                            ->latest()
                            ->paginate(6);

           return view('frontend.pages.ad-list', compact('posts', 'categories', 'category'));

        }elseif(!$request->country_id){
            $posts = AdPost::where('category_id', $id)
                            ->where('ad_title','like','%'.$request->category.'%')
                            ->where('expiry_date', '>=', Carbon::now())
                            ->latest()
                            ->paginate(6);

           return view('frontend.pages.ad-list', compact('posts', 'categories', 'category'));
        }
    }

    public function ads(){
        $normalPosts = AdPost::where('expiry_date', '>=', Carbon::now())->whereNull('featured_id')->latest()->get();
        $featuredPosts = AdPost::whereNotNull('featured_id')->where('featured_expiry_date', '>=', Carbon::now())->latest()->get();
        $posts = $featuredPosts->merge($normalPosts)->paginate(6);

        $categories = Category::all();
        $countries = Country::all();
        return view('frontend.pages.all-ads', compact('posts', 'featuredPosts','categories', 'countries'));
    }

}
