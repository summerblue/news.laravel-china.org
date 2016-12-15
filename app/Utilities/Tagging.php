<?php namespace App\Utilities;

use Overtrue\Pinyin\Pinyin;
use App;

class Tagging
{
    /**
     * Converts input into array
     *
     * @param $tagName string or array
     * @return array
     */
    public function makeTagArray($tagNames)
    {
        if (is_array($tagNames) && count($tagNames) == 1) {
            $tagNames = reset($tagNames);
        }

        if (is_string($tagNames)) {
            $tagNames = explode(',', $tagNames);
        } elseif (!is_array($tagNames)) {
            $tagNames = array(null);
        }

        $tagNames = array_map('trim', $tagNames);

        return array_values($tagNames);
    }

    /**
     * Create a web friendly URL slug from a string.
     *
     * Although supported, transliteration is discouraged because
     * 1) most web browsers support UTF-8 characters in URLs
     * 2) transliteration causes a loss of information
     *
     * @author Sean Murphy <sean@iamseanmurphy.com>
     *
     * @param string $str
     * @return string
     */
    public static function slug($str)
    {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8');

        $options = array(
            'delimiter'     => '-',
            'limit'         => '255',
            'lowercase'     => true,
            'replacements'  => array(),
            'transliterate' => true,
        );

        $char_map = array(
                // Latin
                'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
                'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
                'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
                'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
                'ß' => 'ss',
                'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
                'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
                'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
                'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
                'ÿ' => 'y',

                // Latin symbols
                '©' => '(c)',

                // Greek
                'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
                'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
                'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
                'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
                'Ϋ' => 'Y',
                'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
                'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
                'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
                'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
                'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

                // Turkish
                'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
                'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

                // Russian
                'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
                'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
                'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
                'Я' => 'Ya',
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
                'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
                'я' => 'ya',

                // Ukrainian
                'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
                'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

                // Czech
                'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
                'Ž' => 'Z',
                'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
                'ž' => 'z',

                // Polish
                'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
                'Ż' => 'Z',
                'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
                'ż' => 'z',

                // Latvian
                'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
                'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
                'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
                'š' => 's', 'ū' => 'u', 'ž' => 'z',

                //Romanian
                'Ă' => 'A', 'ă' => 'a', 'Ș' => 'S', 'ș' => 's', 'Ț' => 'T', 'ț' => 't'
        );

        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        // Normalizer tag name
        $str = static::tagName($str);

        $str = app()->make(Pinyin::class)->permlink($str);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }

    public static function tagName($string)
    {
        // from http://stackoverflow.com/a/8483919/689832
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace("/[^\p{L}\p{N}]/u", '-', $string); // Removes special chars.
    }

    /**
     * Look at the tags table and delete any tags that are no londer in use by any taggable database rows.
     * Does not delete tags where 'suggest' is true
     *
     * @return int
     */
    public function deleteUnusedTags()
    {
        $model = $this->tagModelString();
        return $model::deleteUnused();
    }

    /**
     * @return string
     */
    public function tagModelString()
    {
        return '\App\Models\Tag';
    }

    // Check DB Slug Dulplication
    public function uniqueSlug($slug_str, $tag_name)
    {
        $model = $this->tagModelString();
        if (!empty($slug_str) && $tag = $model::where('slug', $slug_str)->first()) {
            // 只有当 slug 一样但 tagname 不一样的情况下，才自动设置随机 slug 后缀
            if ($tag->name != $this->normalizeTagName($tag_name)) {
                $slug_str .= '-'. mt_rand(1000, 9999);
            }
        }
        return $slug_str;
    }

    // Should be call before insert into database
    public function normalizeAndUniqueSlug($tag_name)
    {
        $normalizer = config('taggable.normalizer', static::class.'::slug');
        // Normalize
        $slug_string = call_user_func($normalizer, $tag_name);
        // Make sure slug is unique
        return $this->uniqueSlug($slug_string, $tag_name);
    }

    // Should be call before insert into database
    public function normalizeTagName($string)
    {
        $string = call_user_func('\Illuminate\Support\Str::title', $string);
        $normalizer = config('taggable.displayer', static::class.'::tagName');
        // Normalize
        return call_user_func($normalizer, $string);
    }
}
