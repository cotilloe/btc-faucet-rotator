<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\PaymentProcessor;

/**
 * Class CreatePaymentProcessorRequest
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Http\Requests
 */
class CreatePaymentProcessorRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAnAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return PaymentProcessor::$rules;
    }
}
