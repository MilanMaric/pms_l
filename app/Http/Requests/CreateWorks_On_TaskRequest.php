<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Works_On_Task;

class CreateWorks_On_TaskRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Works_On_Task::$rules;
    }
}
