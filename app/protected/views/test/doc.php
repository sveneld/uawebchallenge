<table width="100%" class="tabledoc">
    <tr>
        <td width="50%"><b>Запит</b></td>
        <td><b>Відповідь</b></td>
    </tr>

    <tr>
        <td>
            Отримати список категорій
            <pre></pre>
        </td>
        <td>
            <pre></pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати список товарів
            <pre>{
    "jsonrpc": "2.0",
    "method": "Product.getList",
    "params": {
        "data": null,
        "key": "03ae7344fce64b8ef0c7dc3a78fae838"
    },
    "id": 1
}</pre>
        </td>
        <td>
            <pre>{
    "jsonrpc": "2.0",
    "id": 1,
    "result": [
        {
            "Id": "4972",
            "Sku": "FB263",
            "Name": "deathnote ryuk фигурка",
            "Description": "Высота ~20 см",
            "Image": "1241695668.jpg",
            "InStock": "0",
            "Price": "225.0000"
        },
        {
            "Id": "4973",
            "Sku": "FB264",
            "Name": "code geass c.c фигурка",
            "Description": "-",
            "Image": "1243256060.jpg",
            "InStock": "0",
            "Price": "302.0000"
        },
        {
            "Id": "4975",
            "Sku": "FB266",
            "Name": "kuroshitsuji Sebastian фигурка",
            "Description": "Высота ~20 см",
            "Image": "1244805796.jpg",
            "InStock": "0",
            "Price": "285.0000"
        },
        {
            "Id": "4976",
            "Sku": "FB267",
            "Name": "kuroshitsuji Ciel фигурка",
            "Description": "Высота ~20 см",
            "Image": "1245587468.jpg",
            "InStock": "0",
            "Price": "299.0000"
        }...
    ]
}</pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати список способів оплати
            <pre></pre>
        </td>
        <td>
            <pre></pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати список способів доставки
            <pre>{
   "jsonrpc":"2.0",
   "method":"ShippingMethod.getList",
   "params":{
      "data":null,
      "key":"03ae7344fce64b8ef0c7dc3a78fae838"
   },
   "id":1
}</pre>
        </td>
        <td>
            <pre>{
    "jsonrpc": "2.0",
    "id": 1,
    "result": [
        {
            "Id": "1",
            "Name": "Самовывоз",
            "Cost": "0.0000",
            "AdditionalParam": null
        }
    ]
}</pre>
        </td>
    </tr>
    <tr>
        <td>
            Відправити замовлення
            <pre></pre>
        </td>
        <td>
            <pre></pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати данні по замовленню
            <pre></pre>
        </td>
        <td>
            <pre></pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати статус замовлення
            <pre></pre>
        </td>
        <td>
            <pre></pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати список замовлень
            <pre></pre>
        </td>
        <td>
            <pre></pre>
        </td>
    </tr>

</table>