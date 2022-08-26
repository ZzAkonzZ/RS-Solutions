<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'company_name' => ['required', 'regex:/^([\pL\s\d«»,\.\/\-\#№@&()])+$/u'],
            'address' => ['required', 'regex:/^([\pL\s\d«»,\.\/\-\#№@&()])+$/u'],
            'post_index' => ['required', 'numeric'],
            'company_phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'bin' => ['required', 'digits:12'],
            'iik' => ['required', 'alpha_num', 'size:20'],
            'bank_name' => ['required', 'regex:/^([\pL\s])+$/u'],
            'bik' => ['required', 'min:8', 'regex:/^([\pL\d])+$/u'],
            'ceo_name' => ['required', 'regex:/^[\pL\s]+$/u'],
            'responsible_person' => ['required', 'regex:/^[\pL\s]+$/u'],
            'responsible_person_phone' => ['required', 'numeric'],
            'responsible_person_email' => ['required', 'email'],
            'domen' => ['required', 'regex:/^[\pL\.\-]+$/u'],
            'certificate' => ['required', 'mimetypes:application/pdf', 'file', 'max:21000'],
            // 'captcha' => ['required', 'captcha'],
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Необходимо заполнить «Название организации»',
            'company_name.regex' => 'Значение поля неверно. Поле может содержать только цифровые символы символы латиницы, кирилицы, казахские символы и символы «» , . \ - # № @ & (). Пример: ТОО RS Solutions',

            'address.required' => 'Необходимо заполнить «Юридический адрес»',
            'address.regex' => 'Значение поля неверно. Поле может содержать только цифровые символы символы латиницы, кирилицы, казахские символы и символы «» , . \ - # № @ & (). Пример: ТОО RS Solutions',

            'post_index.required' => 'Необходимо заполнить «Почтовый индекс»',
            'post_index.numeric' => 'Значение «Почтовый индекс» должно быть числом',

            'company_phone.required' => 'Необходимо заполнить «Телефон организации»',
            'company_phone.numeric' => 'Значение «Телефон организации» должно быть числом',

            'email.required' => 'Необходимо заполнить «Телефон организации»',
            'email.email' => 'Значение «E-mail адрес организации» не является правильным email адресом.',

            'bin.required' => 'Необходимо заполнить «БИН',
            'bin.digits' => 'Значение БИН должно содержать 12 цифр',

            'iik.required' => 'Необходимо заполнить «ИИК KZ (20 значный счет)»',
            'iik.alpha_num' => 'Значение «ИИК KZ (20 значный счет)» должно содержать только буквы и цифры',
            'iik.size' => 'Значение «ИИК KZ (20 значный счет)» должно содержать минимум 20 символа',

            'bank_name.required' => 'Необходимо заполнить «Название банка»',
            'bank_name.regex' => 'Значение поля неверно. Поле может содержать только символы латиницы, кирилицы, казахские символы',

            'bik.required' => 'Необходимо заполнить « БИН 8 цифр»',
            'bik.min' => 'Значение «БИК 8 латинских букв и цифры» должно содержать минимум 8 символа',
            'bik.regex' => 'Значение «БИК» должно содержать только символы цифры и символы латиницы',

            'ceo_name.required' => 'Необходимо заполнить «ФИО (Руководителя)»',
            'ceo_name.regex' => 'Значение поля неверно. Поле может содержать только символы латиницы, кирилицы, казахские символы. Пример: Иванов Иван Иванович',

            'responsible_person.required' => 'Необходимо заполнить «ФИО (ответственного лица)»',
            'responsible_person.regex' => 'Значение поля неверно. Поле может содержать только символы латиницы, кирилицы, казахские символы. Пример: Иванов Иван Иванович',

            'responsible_person_phone.required' => 'Необходимо заполнить «Телефон ответственного лица»',
            'responsible_person_phone.numeric' => 'Значение «Телефон ответственного лица» должно быть числом',

            'responsible_person_email.required' => 'Необходимо заполнить «Е –mail ответственного лица»',
            'responsible_person_email.email' => 'Значение «E-mail ответственного лица» не является правильным email адресом.',

            'domen.required' => 'Необходимо заполнить «Желаемое название домена в зоне edu.kz, например: название организации.edu.kz»',
            'domen.regex' => 'Значение поля неверно. Поле должен быть в формате домена',

            'certificate.required' => 'Необходимо загрузить файл',
            'certificate.file' => 'Необходимо загрузить файл',
            'certificate.mimetypes' => 'Файл должен быть в формате PDF',
            'certificate.size' => 'Не удалось загрузить файл. Размер не должен превышать 2.00 МиБ',

            // 'captcha.required' => 'Необходимо заполнить «Код с картинки»',
            // 'captcha.captcha' => 'Неверный код с картинки',
        ];
    }
}