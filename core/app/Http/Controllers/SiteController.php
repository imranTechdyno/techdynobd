<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SectionData;
use App\Models\Page;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SiteController extends Controller
{
    public function index()
    {
        $pageTitle = 'Home';
        $sections = Page::where('name', 'home')->first();

        if (!$sections) {

            $sections = Page::create([
                'name' => 'home',
                'sections' => ['banner'],
                'slug' => 'home',
                'seo_description' => 'home',
                'page_order' => 1
            ]);
        }

        return view('frontend.home', compact('pageTitle', 'sections'));
    }


    public function page(Request $request)
    {
        $page = Page::where('slug', $request->pages)->first();

        if (!$page) {
            abort(404);
        }

        $pageTitle = "{$page->name}";


        return view('frontend.pages', compact('pageTitle', 'page'));
    }


    public function allservices()
    {
        $data = Service::paginate(12);
        $pageTitle = 'all-services';
        return view('frontend.pages.allservice', compact('pageTitle', 'data'));
    }


    public function viewallservices()
    {
        $data['common'] = content('services.content');

        $data['categories'] = Category::where('parent_category', 'service')->paginate(12);
        $data['pageTitle'] = 'Services';
        return view('frontend.pages.allcategories')->with($data);
    }

    public function viewallsolution()
    {
        $data['common'] = content('solution.content');
        $data['categories'] = Category::where('parent_category', 'solution')->paginate(12);
        $data['pageTitle'] = 'Solutions';
        return view('frontend.pages.allcategories')->with($data);
    }

    public function viewallproduct()
    {
        $data['common'] = content('product.content');
        $data['categories'] = Category::where('parent_category', 'product')->paginate(12);
        $data['pageTitle'] = 'Services';
        return view('frontend.pages.allcategories')->with($data);
    }

    public function allsub()
    {
        $data['sub'] = Category::paginate(12);
        $data['pageTitle'] = 'Services';
        return view('frontend.pages.allsub')->with($data);
    }


    public function subcategoryServices($id)
    {
        $data['data'] = Subcategory::where('category_id', $id)->paginate(12);
        $data['category'] = Category::find($id);
        $data['pageTitle'] = $data['category']->name;
        return view('frontend.pages.serviceproducts')->with($data);
    }

    public function subcategoryallServices($id, $sub)
    {
        $data['service'] = Service::with('subcategory', 'service_faq', 'gallery_image')->where('sub_category_id', $id)->first();
        if ($data['service']) {
            $data['pageTitle'] = $data['service']->subcategory->name;
            $data['related'] = Service::where('id', '!=', $data['service']->id)->where('category_id', $data['service']->category_id)->latest()->get();
            return view('frontend.pages.service_details')->with($data);
        }

        if ($sub == "company") {
            $data['data'] = Company::find($id);
            $data['details'] = $sub;
            $data['service'] = Service::where('company_id', $id)->paginate(12);
            $data['pageTitle'] = $data['data']->name;
            return view('frontend.pages.sub_product')->with($data);
        }


        return redirect()->back()->with('error', 'no associated result found for this service');
    }


    public function training($slug)
    {
        $data['training_first'] = Traning::where('slug', $slug)->firstOrFail();
        $data['pageTitle'] = $data['training_first']->name;

        return view('frontend.pages.training')->with($data);
    }

    public function library($slug)
    {
        $data['library_first'] = Library::where('slug', $slug)->firstOrFail();
        $data['pageTitle'] = $data['library_first']->name;

        return view('frontend.pages.library')->with($data);
    }

    public function allNews()
    {
        $news = SectionData::where('key', 'blog.element')
            ->latest()
            ->paginate(12);
        $pageTitle = 'All-News';
        return view('frontend.pages.blogs', compact('pageTitle', 'news'));
    }

    public function career()
    {
        $pageTitle = 'Career';
        return view('frontend.pages.career', compact('pageTitle'));
    }

    public function expression()
    {
        $pageTitle = 'Expression of interest';
        return view('frontend.pages.expression', compact('pageTitle'));
    }


    public function newsDetails($id)
    {
        $news = SectionData::where('key', 'affiliation.element')->where('id', $id)->first();
        $pageTitle = @$news->data->title;
        $recentnews = SectionData::where('key', 'affiliation.element')->where('id', '!=', $id)->latest()->get();
        return view('frontend.pages.blog_details', compact('pageTitle', 'news', 'recentnews'));
    }

    public function contact()
    {
        $active_contact = 'active';
        $pageTitle = 'Contact US';
        return view('frontend.pages.contact', compact('pageTitle', 'active_contact'));
    }

    public function contactStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'thank you for contacting with us! Shortly we will get back to you');
    }

    public function terms()
    {
        $pageTitle = 'Terms Of Service';
        $data = content('terms_condition.content');
        return view('frontend.pages.terms_condition', compact('pageTitle', 'data'));
    }

    //newsletetr-subscriber
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscriber::create([
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'newsletter subscription is successful',
        ]);
    }

    public function serviceDetails($id)
    {
        $data['service'] = Service::with('subcategory', 'service_faq', 'gallery_image')->where('id', $id)->first();
        if ($data['service']) {
            $data['pageTitle'] = $data['service']->subcategory->name;
            $data['related'] = Service::where('id', '!=', $data['service']->id)->where('category_id', $data['service']->category_id)->latest()->get();
            return view('frontend.pages.service_details')->with($data);
        }

        return redirect()->back()->with('error', 'no associated result found for this service');
    }

    public function getServiceDetails($id)
    {
        $data['service'] = Service::with('subcategory', 'service_faq', 'gallery_image')->where('sub_category_id', $id)->first();
        if ($data['service']) {
            $data['pageTitle'] = $data['service']->subcategory->name;
            $data['related'] = Service::where('id', '!=', $data['service']->id)->where('category_id', $data['service']->category_id)->latest()->get();
            return view('frontend.pages.service_details')->with($data);
        }

        return redirect()->back()->with('error', 'no associated result found for this service');
    }


    public function search(Request $request)
    {
        if ($request->search != null) {
            $data = Subcategory::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('name')->get();
            return view('frontend.pages.ajaxsearchitem', compact('data'));
        }
    }


    public function quote(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'service' => 'required',
            'budget' => 'required',
            'message' => 'required',
        ]);

        $quote = new Quote();

        $quote->name = $request->name;
        $quote->email = $request->email;
        $quote->phone = $request->phone;
        $quote->company = $request->company;
        $quote->service = $request->service;
        $quote->budget = $request->budget;
        $quote->message = $request->message;
        $quote->file = $request->company;

        $quote->save();

        $message = $quote->name . ' Send a Quote';
        $admins = Admin::all();
        Notification::send($admins, new quoteNotification($message));

        return back()->with('success', 'thank you for contacting with us! Shortly we will get back to you');
    }

    public function getChildCategory($id)
    {
        $service_category = Category::where('parent_category', $id)->get();

        return response()->json([
            'service_category' => $service_category
        ]);
    }

    public function getService($id)
    {
        $service_data = Service::with('subcategory')->where('category_id', $id)->get();
        return response()->json([
            'service' => $service_data
        ]);
    }

    public function resumeDownload($id)
    {
        $data = SectionData::where('id', $id)
            ->first();
        $path = 'asset/images/default/' . $data->data->cv_format;
        if ($data->data->cv_format) {
            return response()->download($path);
        } else {
            return redirect()->back()->with('success', 'resume format not found');
        }
    }
}
