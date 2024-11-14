<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    // Return index page 
    public function index()
    {
        $webSetting =  WebSetting::first();
        return view('admin.web-setting.index', compact('webSetting'));
    }


    // Show form for web setting
    public function setWebSettingIndex($id)
    {
        $webSetting = WebSetting::find($id);
        return view('admin.web-setting.set', compact('webSetting'));
    }


    // Create or update web setting
    public function setWebSetting(Request $request, $id, ImageUploadService $imageUploadService)
    {
        $webSetting = WebSetting::find($id);

        if($webSetting) {
            $inputs = $request->validate([
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'description' => 'required|max:300|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'key_words' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'logo' => 'image|mimes:png,jpg,jpeg,gif',
                'icon' => 'image|mimes:png,jpg,jpeg,gif'
            ]);

            if($request->hasFile('logo')) {
                // Remove old image
                $imageUploadService->removeImage($webSetting->logo);
    
                $result = $imageUploadService->uploadImage($request->file('logo'), 'Logo');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['logo'] = $result;
            }

            if($request->hasFile('icon')) {
                // Remove old image
                $imageUploadService->removeImage($webSetting->icon);
    
                $result = $imageUploadService->uploadImage($request->file('icon'), 'Icon');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['icon'] = $result;
            }

            $webSetting->update($inputs);
            return to_route('admin.webSetting.index')->with('swal-success', 'تنظیمات سایت آپدیت شد');

        } else {
            $inputs = $request->validate([
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'description' => 'required|max:300|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'key_words' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'logo' => 'required|image|mimes:png,jpg,jpeg,gif',
                'icon' => 'required|image|mimes:png,jpg,jpeg,gif'
            ]);
            
            $inputs['name'] = env("APP_NAME");

            if($request->hasFile('logo')) {
    
                $result = $imageUploadService->uploadImage($request->file('logo'), 'Logo');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['logo'] = $result;
            }

            if($request->hasFile('icon')) {
    
                $result = $imageUploadService->uploadImage($request->file('icon'), 'Icon');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['icon'] = $result;
            }

            $webSetting = WebSetting::create($inputs);
            return to_route('admin.webSetting.index')->with('swal-success', 'تنظیمات سایت ساخته شد');
        }
    }
}
