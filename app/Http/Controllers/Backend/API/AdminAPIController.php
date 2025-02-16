<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;
use App\Models\Platform;
use App\Models\Card;
use Exception;
use App\Models\Blog;
use App\Models\Version;

class AdminAPIController extends Controller
{
    // show site informations
    public function siteInformation()
    {
        $siteInfos = SiteInfo::all();
        return response()->json([
            'status' => 'success',
            'Site Informations' => $siteInfos
        ],200);
    }

    // update site informations
    public function updateSiteInfo(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'copy_right_text' => 'nullable|string|max:255',
                'fav_icon' => 'nullable|string|max:255',
            ]);

            $siteInfo = SiteInfo::find($id);
            if(!$siteInfo){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Site Info not found'
                ],404);
            }

            $siteInfo->title = $request->input('title') ?? $siteInfo->title;
            $siteInfo->copy_right_text = $request->input('copy_right_text') ?? $siteInfo->copy_right_text;
            $siteInfo->fav_icon = $request->input('fav_icon') ?? $siteInfo->fav_icon;

            $siteInfo->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Site Information updated successfully'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }


    // show platforms
    public function platforms()
    {
        $platforms = Platform::all();
        $platformsCount = $platforms->count();
        if($platformsCount==0){
            return response()->json([
                'status' => 'error',
                'message' => 'Platforms not found'
            ],404);
        }
        return response()->json([
            'status' => 'success',
            'Platforms' => $platforms
        ],200);
    }

    // create platform
    public function createPlatform(Request $request)
    {
        try {
            $request['name'] = strtolower(trim($request->input('name')));

            $request->validate([
                'name' => 'required|string|max:255|unique:platforms',
            ]);

            $platform = new Platform();
            $platform->name = $request->input('name');
            $platform->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Platform created successfully',
                'Created Platform' => $platform
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }


    // update platform
    public function updatePlatform(Request $request, $id)
    {
        try {
            $platform = Platform::find($id);
            if(!$platform){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Platform not found'
                ],404);
            }
            
            $request['name'] = strtolower(trim($request->input('name')));

            $request->validate([
                'name' => 'nullable|string|max:255|unique:platforms',
            ]);

            $platform->name = $request->input('name') ?? $platform->name;  

            $platform->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Platform updated successfully',
                'Updated Platform' => $platform
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }

    // delete platform
    public function deletePlatform($id)
    {
        try {
            $platform = Platform::find($id);
            if(!$platform){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Platform not found'
                ],404);
            }       

            $platform->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Platform deleted successfully'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }
            
    // show cards
    public function cards()
    {
        $cards = Card::all();
        $cardsCount = $cards->count();
        if($cardsCount==0){
            return response()->json([
                'status' => 'error',
                'message' => 'Cards not found'
            ],404);
        }
        return response()->json([
            'status' => 'success',
            'Cards' => $cards
        ],200);
    }

    // create card
    public function createCard(Request $request)
    {
        try {
            $card = new Card();
            $card->platform_id = $request->input('platform_id');  
            $card->title = $request->input('title');
            $card->image = "cards/".$request->input('image');  
            $card->seller = $request->input('seller');  
            $card->type = $request->input('type');  
            $card->base_price = $request->input('base_price');  
            $card->discount = $request->input('discount');  
            // $card->versions = $request->input('versions');
            // $card->amounts = $request->input('amounts');
            $card->stock = $request->input('stock');  
            $card->usage = $request->input('usage');  
            $card->description = $request->input('description'); 
            $card->delivery_time = $request->input('delivery_time');
  
            $card->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Card created successfully',
                'Created Card' => $card
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }



    // update card
    public function updateCard(Request $request, $id)
    {
        try {
            $card = Card::find($id);
            if(!$card){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Card not found'
                ],404);
            }

            $card->platform_id = $request->input('platform_id');  
            $card->title = $request->input('title');
            $card->image = "cards/".$request->input('image');  
            $card->seller = $request->input('seller');  
            $card->type = $request->input('type');  
            $card->base_price = $request->input('base_price');  
            $card->discount = $request->input('discount');  
            $card->versions = $request->input('versions');
            $card->amounts = $request->input('amounts');
            $card->stock = $request->input('stock');  
            $card->usage = $request->input('usage');  
            $card->description = $request->input('description'); 
            $card->delivery_time = $request->input('delivery_time');
  
            $card->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Card updated successfully',
                'Updated Card' => $card
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }


    public function cardAmounts($id)
    {
        try {
            $card = Card::find($id);
            if(!$card){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Card not found'
                ],404);
            }
            $cardAmounts = $card->amounts;
            return response()->json([
                'status' => 'success',
                'Card Amounts' => $cardAmounts
            ],200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500);
        }
    }

    public function cardVersions($id)
    {
        try {
            $card = Card::find($id);
            if(!$card){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Card not found'
                ],404);
            }
            $cardVersions = $card->versions;
            return response()->json([
                'status' => 'success',
                'Card Versions' => $cardVersions
            ],200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 
        }
    }



    // show blogs
    public function blogs()
    {
        $blogs = Blog::all();
        $blogsCount = $blogs->count();
        if($blogsCount==0){
            return response()->json([
                'status' => 'error',
                'message' => 'Blogs not found'
            ],404);
        }
        return response()->json([
            'status' => 'success',
            'Blogs' => $blogs
        ],200);
    }

    // create blog
    public function createBlog(Request $request)
    {
        try {
            $blog = new Blog();
            $blog->title = $request->input('title');
            $blog->author = $request->input('author');
            $blog->content = $request->input('content');
            $blog->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Blog created successfully',
                'Created Blog' => $blog
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }

    //update blog
    public function updateBlog(Request $request, $id)
    {
        try {
            $blog = Blog::find($id);
            if(!$blog){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Blog not found'
                ],404);
            }

            $blog->title = $request->input('title') ?? $blog->title;
            $blog->author = $request->input('author') ?? $blog->author;
            $blog->content = $request->input('content') ?? $blog->content;
            $blog->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Blog updated successfully',
                'Updated Blog' => $blog
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }

    // delete blog
    public function deleteBlog($id)
    {
        try {
            $blog = Blog::find($id);
            if(!$blog){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Blog not found'
                ],404);
            }   

            $blog->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Blog deleted successfully'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }


    // create version
    public function createVersion(Request $request)
    {
        try {
            $request['name'] = strtolower(trim($request->input('name')));

            $request->validate([
                'name' => 'nullable|string|max:255|unique:versions',
            ]);

            $version = new Version();
            $version->name = $request->input('name');
            $version->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Version created successfully',
                'Created Version' => $version
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }

    // show versions
    public function versions()
    {
        $versions = Version::all();
        $versionsCount = $versions->count();
        if($versionsCount==0){
            return response()->json([
                'status' => 'error',
                'message' => 'Versions not found'
            ],404);
        }
        return response()->json([
            'status' => 'success',
            'Versions' => $versions
        ],200);
    }

    // update version
    public function updateVersion(Request $request, $id)
    {
        try {
            $version = Version::find($id);
            if(!$version){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Version not found'
                ],404);
            }

            $version->name = $request->input('name') ?? $version->name;
            $version->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Version updated successfully',
                'Updated Version' => $version
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }

    // delete version
    public function deleteVersion($id)
    {
        try {
            $version = Version::find($id);
            if(!$version){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Version not found'
                ],404);
            }   

            $version->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Version deleted successfully'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }    
    }




}
