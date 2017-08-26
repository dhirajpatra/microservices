<?php
/**
 * Created by PhpStorm.
 * User: tanushreepatra
 * Date: 25/8/17
 * Time: 4:36 PM
 */

namespace app\Http\Requests;

use app\Http\Requests\Request;

class ContactFormRequest extends Request {

    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }

}