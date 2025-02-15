<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;
use App\Models\Platform;
use App\Models\Card;
use Exception;
use App\Models\Blog;

class AdminAPIController extends Controller
{
    public function siteInformation()
    {
        $siteInfos = SiteInfo::all();
        return response()->json([
            'status' => 'success',
            'Site Informations' => $siteInfos
        ],200);
    }

    public function updateSiteInfo(Request $request, $id)
    {
        try {
            $siteInfo = SiteInfo::find($id);
            if(!$siteInfo){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Site Info not found'
                ],404);
            }

            $updatedSiteInfo = $siteInfo->update([
                'title' => $request->title,
                'fav_icon' => $request->fav_icon,
                'copy_right_text' => $request->copy_right_text
            ]);


            return response()->json([
                'status' => 'success',
                'message' => 'Site Info updated successfully',
                'Site Info' => $updatedSiteInfo
            ],200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500); 

        }
    }

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
}
