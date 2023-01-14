<?php

namespace App\Http\Requests;

use App\Exceptions\Http\ValidationErrorException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

abstract class FormRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @todo Remove this method after {@link AuthApiRequest} and
     *  {@link InternalApim2ApiRequest} are made as abstract so that they won't
     *  be injected directly in controller actions. Additionally, developers
     *  should declare rules method in their derived FormRequest instances
     *  merely without empty rules method defined in parent classes so that they
     *  can inject dependencies within the rules method's signature.
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            '*' => ':attribute 不符合規範，請參考 API 文件',
        ];
    }

    /**
     * @inheritdoc
     */
    final protected function failedValidation(Validator $validator)
    {
        $exception = new ValidationErrorException();
        $exception->setErrorDetails($validator->errors()->getMessages());
        throw $exception;
    }
}
