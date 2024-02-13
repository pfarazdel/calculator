<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ماشین حساب </title>
</head>

<!-- این برنامه یک ماشین حساب ساده، به جهت محاسبه چهار عمل اصلی می‌باشد. -->

<body>
    <!-- دریافت عملوندهای ورودی جهت محاسبه -->
    <label for="number1"> عدد اول: </label>
    <input type="text" id="number1">
    <br /><br />

    <label for="number2"> عدد دوم: </label>
    <input type="text" id="number2">
    <br /><br />

    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <!-- دکمه عملگرهای محاسباتی -->
    <button type="button" onclick="calc('add')"> + </button>
    <button type="button" onclick="calc('sub')"> - </button>
    <button type="button" onclick="calc('mult')"> * </button>
    <button type="button" onclick="calc('div')"> / </button>
    <br /><br />

    <!-- نمایش نتیجه محاسبه -->
    &nbsp;
    <label for="result"> نتیجه محاسبه </label>
    <span id="result"></span>

    <script>
        /**
         * فانکشن محاسبه عملیات ماشین حساب.
         * 
         * عملیات مورد انجام در این فانکشن عبارت است از:
         * ساخت شئ جدید از کلاس XMLHttpRequest،
         * که با آن می‌توان دیتاها را به سرور ارسال و از آن دریافت کرد.
         * دریافت مقادیر و ذخیره در متغیر.
         * بررسی وضعیت درخواست.
         * اگر شرط بررسی درخواست با نتیجه صحیح برقرار شود،
         * نتیجه به شناسه result منتقل شده،
         * سپس به responseText انتقال یافته،
         * در نهایت در قسمت داخلی HTML قرار می‌گیرد.
         * 
         * @param {string} ReqType نوع مقدار درخواستی فانکشن
         */

        function calc(ReqType) {
            var xhr = new XMLHttpRequest();

            var number1 = document.getElementById("number1").value;
            var number2 = document.getElementById("number2").value;

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            }

            // به روش POST:
            xhr.open("POST", "91-calculator-print.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("req=" + ReqType + "&num1=" + number1 + "&num2=" + number2);
        }
    </script>
</body>

</html>