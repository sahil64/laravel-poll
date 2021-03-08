<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Question extends Model
{
    use HasFactory;
    protected $fillable=['title','body'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] =$value;
        $this->attributes['slug']=str_slug($value);
    }

    public function getUrlattribute(){
        return route("question.show",$this->slug);
        //return "#";
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
        if($this->answers_count>0){
            if($this->best_ansers_id){
                return "answer-accepted";
            }
            return "answered";
        }
        return "unansered";
    }

    public function getBodyHtmlAttribute(){
        return Parsedown::instance()->text($this->body);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
