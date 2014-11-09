<table width="100%" class="tabledoc">
    <tr>
        <td width="50%"><b>Запит</b></td>
        <td><b>Відповідь</b></td>
    </tr>

    <tr>
        <td>
            Отримати список категорій
            <pre>{
    "jsonrpc": "2.0",
    "method": "ProductCategory.getList",
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
            "Id": "1",
            "Name": "Фигурки"
        },
        {
            "Id": "2",
            "Name": "Манга (Комиксы)"
        }
    ]
}</pre>
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
            <pre>{
    "jsonrpc": "2.0",
    "method": "PaymentMethod.getList",
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
            "Id": "1",
            "Name": "Оплата при получении",
            "Cost": "0.0000",
            "AdditionalParam": null
        },
        {
            "Id": "2",
            "Name": "Приват24",
            "Cost": "0.0000",
            "AdditionalParam": null
        }
    ]
}</pre>
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
            <pre>{
    "jsonrpc": "2.0",
    "method": "Order.add",
    "params": {
        "data": {
            "FullName": "Петров Петро Петрович",
            "Phone": "+380660001122",
            "Country": "Україна",
            "City": "Київ",
            "Address": "Петренка 10",
            "IdShippingMethod": 2,
            "IdPaymentMethod": 2,
            "Discount": 2,
            "Fee": 2,
            "PhoneAdditional": "",
            "Products": [
                {
                    "Sku": "FB293",
                    "Quantity": "2",
                    "Price": 156.29
                },
                {
                    "Sku": "FB291",
                    "Quantity": 3,
                    "Price": 500
                }
            ]
        },
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
            "IdOrder": "14"
        }
    ]
}</pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати данні по замовленню
            <pre>{
    "jsonrpc": "2.0",
    "method": "Order.get",
    "params": {
        "data": {
            "IdOrder": "5"
        },
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
            "IdOrder": "5",
            "FullName": "Петров Петро Петрович",
            "Phone": "+380660001122",
            "PhoneAdditional": null,
            "Country": "Україна",
            "City": "Київ",
            "Address": "Петренка 10",
            "AddressAdditional": null,
            "SubTotal": "1998.0000",
            "ShippingTotal": "20.0000",
            "PaymentTotal": "0.0000",
            "Discount": "2.0000",
            "Fee": "2.0000",
            "Total": "2.0000",
            "ShippingMethodName": "Укрпочта",
            "IdShippingMethod": "2",
            "PaymentMethodName": "Приват24",
            "IdPaymentMethod": "2",
            "IdOrderStatus": "1",
            "Products": [
                {
                    "Name": "KiKis Delivery Service фигурка",
                    "Sku": "FB291",
                    "Price": "500.0000",
                    "Quantity": "3"
                },
                {
                    "Name": "Фигурка Rozen Maiden",
                    "Sku": "FB293",
                    "Price": "156.2900",
                    "Quantity": "2"
                }
            ]
        }
    ]
}</pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати статус замовлення
            <pre>{
    "jsonrpc": "2.0",
    "method": "Order.getStatus",
    "params": {
        "data": {
            "IdOrder": "5"
        },
        "key": "03ae7344fce64b8ef0c7dc3a78fae838"
    },
    "id": 1
}</pre>
        </td>
        <td>
            <pre></pre>
        </td>
    </tr>
    <tr>
        <td>
            Отримати список замовлень
            <pre>{
    "jsonrpc": "2.0",
    "method": "Order.getList",
    "params": {
        "data": {
            "DateFrom": "01-11-2014",
            "DateTo": "15-11-2014",
            "Page": "1"
        },
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
            "IdOrder": "1",
            "FullName": "Петров Петро Петрович",
            "Phone": "+380660001122",
            "PhoneAdditional": null,
            "Country": "Україна",
            "City": "Київ",
            "Address": "Петренка 10",
            "AddressAdditional": null,
            "SubTotal": "1998.0000",
            "ShippingTotal": "20.0000",
            "PaymentTotal": "0.0000",
            "Discount": "2.0000",
            "Fee": "2.0000",
            "Total": "2.0000",
            "ShippingMethodName": "Укрпочта",
            "IdShippingMethod": "2",
            "PaymentMethodName": "Приват24",
            "IdPaymentMethod": "2",
            "IdOrderStatus": "1",
            "Products": [
                {
                    "Name": "KiKis Delivery Service фигурка",
                    "Sku": "FB291",
                    "Price": "500.0000",
                    "Quantity": "3"
                },
                {
                    "Name": "Фигурка Rozen Maiden",
                    "Sku": "FB293",
                    "Price": "156.2900",
                    "Quantity": "2"
                }
            ]
        },
        {
            "IdOrder": "2",
            "FullName": "Петров Петро Петрович",
            "Phone": "+380660001122",
            "PhoneAdditional": null,
            "Country": "Україна",
            "City": "Київ",
            "Address": "Петренка 10",
            "AddressAdditional": null,
            "SubTotal": "1998.0000",
            "ShippingTotal": "20.0000",
            "PaymentTotal": "0.0000",
            "Discount": "2.0000",
            "Fee": "2.0000",
            "Total": "2.0000",
            "ShippingMethodName": "Укрпочта",
            "IdShippingMethod": "2",
            "PaymentMethodName": "Приват24",
            "IdPaymentMethod": "2",
            "IdOrderStatus": "1",
            "Products": [
                {
                    "Name": "KiKis Delivery Service фигурка",
                    "Sku": "FB291",
                    "Price": "500.0000",
                    "Quantity": "3"
                },
                {
                    "Name": "Фигурка Rozen Maiden",
                    "Sku": "FB293",
                    "Price": "156.2900",
                    "Quantity": "2"
                }
            ]
        } ...
    ]
}</pre>
        </td>
    </tr>

</table>