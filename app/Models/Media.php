<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Intervention\Image\ImageManagerStatic as Image;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename'
    ];

    public function filename(){
        return '/media/'.$this->filename;
    }

    public function deleteAllData(){
        $filename = public_path('/media').'/'.$this->filename;
        if($this->delete()){
            self::deleteFile($filename);
            return true;
        }
        return false;
    }

    public static function uploadFiles($file, $index){
        $path = public_path('/media');
        if(!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        $savedFiles = [];

        //foreach($files as $file) {
            $mediaFile = md5(microtime()).'.'.$file->getClientOriginalExtension();
            $file->move($path, $mediaFile);

            // reduce quality
    		$image = Image::make($path.'/'.$mediaFile);
    		$image->save($path.'/'.$mediaFile, 50);

            $mediaModel = new Media;
            $mediaModel->filename = $mediaFile;
            if($mediaModel->save()){
                $savedFiles[$index] = $mediaModel->id;
            }
        //}
        return $savedFiles;
    }

    public static function deleteFile($filename){
        if(file_exists($filename)){
            unlink($filename);
        }
    }

    public function canDelete(){
        $id = $this->id;
        $check = true;

        $checkProperties = Property::where('preview_image_id', '=', $id)->orWhere('page_banner_id', '=', $id)->count();
        $checkPropertyFeatures = PropertyFeature::where('media_id', '=', $id)->count();

        $checkDirections = Direction::where('preview_image_id', '=', $id)->orWhere('page_banner_id', '=', $id)->count();
        $checkDirectionFeatures = DirectionFeature::where('media_id', '=', $id)->count();

        $checkArticles = BlogArticle::where('page_banner_id', '=', $id)->count();
        $checkArticleScreens = BlogArticleScreen::where('media_id', '=', $id)->count();

        if($checkProperties || $checkPropertyFeatures || $checkDirections || $checkDirectionFeatures || $checkArticles || $checkArticleScreens){
            $check = false;
        }
        return $check;
    }

}
