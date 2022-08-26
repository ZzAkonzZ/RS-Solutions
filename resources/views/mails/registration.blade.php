<table>
    <tr>
        <th>Наименование организации</th>
        <th>Юридический адрес организации, включая город/область</th>
        <th>Почтовый индекс</th>
        <th>Телефон организации</th>
        <th>E-mail адрес организации</th>
    </tr>
    <tr>
        <td>{{ $datas['company_name'] }}</td>
        <td>{{ $datas['address'] }}</td>
        <td>{{ $datas['post_index'] }}</td>
        <td>{{ $datas['company_phone'] }}</td>
        <td>{{ $datas['email'] }}</td>
    </tr>
</table>

<table>
    <tr>
        <th>БИН</th>
        <th>ИИК</th>
        <th>Наименование банка</th>
        <th>БИК</th>
    </tr>
    <tr>
        <td>{{ $datas['bin'] }}</td>
        <td>{{ $datas['iik'] }}</td>
        <td>{{ $datas['bank_name'] }}</td>
        <td>{{ $datas['bik'] }}</td>
    </tr>
</table>

<table>
    <tr>
        <th>ФИО руководителя организации</th>
        <th>Ответственное лицо</th>
        <th>Телефон ответственного лица</th>
        <th>E-mail ответственного лица</th>
        <th>Желаемое название доменного имени в зоне edu.kz</th>
    </tr>
    <tr>
        <td>{{ $datas['ceo_name'] }}</td>
        <td>{{ $datas['responsible_person'] }}</td>
        <td>{{ $datas['responsible_person_phone'] }}</td>
        <td>{{ $datas['responsible_person_email'] }}</td>
        <td>{{ $datas['domen'] }}</td>
    </tr>
</table>

<style>
    table {
        border-collapse: collapse;
        margin-bottom: 10px;
    }
    th, td{
        border: 1px solid black;
        padding: 5px 10px
    }
</style>