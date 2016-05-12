<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionRequest extends Request
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
        return [
            'title' => 'required|min:5|max:100',
            'answer_1' => 'required|max:120',
            'answer_2' => 'required|max:120',
            'answer_3' => 'required|max:120',
            'answer_4' => 'required|max:120',
            'right_answer' => 'required|min:1|max:4',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vous n\'indiquer pas la question',
            'title.min' => 'Votre question est trop courte (5 caractères minimum)',
            'title.max' => 'Votre question dépasse la limite de 100 caractères',
            'answer_1.required' => 'Vous n\'avez pas spécifié toutes les questions',
            'answer_1.max' => 'La réponse 1 est trop longue',
            'answer_2.required' => 'Vous n\'avez pas spécifié toutes les questions',
            'answer_2.max' => 'La réponse 2 est trop longue',
            'answer_3.required' => 'Vous n\'avez pas spécifié toutes les questions',
            'answer_3.max' => 'La réponse 3 est trop longue',
            'answer_4.required' => 'Vous n\'avez pas spécifié toutes les questions',
            'answer_4.max' => 'La réponse 4 est trop longue',
            'right_answer.required' => 'Vous n\'avez pas indiquer de bonne réponse',
            'right_answer.min' => 'Le chiffre doit être compris entre 1 et 4',
            'right_answer.max' => 'Le chiffre doit être compris entre 1 et 4',
        ];
    }
}
