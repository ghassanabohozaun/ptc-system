?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class AttributeValue extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'attribute_values';
    protected $fillable = ['attribute_id', 'value'];
    public array $translatable = ['value'];
    public $timestamps = false;

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
}
