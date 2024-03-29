<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Crear facturas con HTML, CSS y JavaScript</title>
    <style>
        /*! normalize.css v3.0.2 | MIT License | git.io/normalize */

        html {
            font-family: sans-serif;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
            display: block
        }

        audio,
        canvas,
        progress,
        video {
            display: inline-block;
            vertical-align: baseline
        }

        audio:not([controls]) {
            display: none;
            height: 0
        }

        [hidden],
        template {
            display: none
        }

        a {
            background-color: transparent
        }

        a:active,
        a:hover {
            outline: 0
        }

        abbr[title] {
            border-bottom: 1px dotted
        }

        b,
        strong {
            font-weight: bold
        }

        dfn {
            font-style: italic
        }

        h1 {
            font-size: 2em;
            margin: 0.67em 0
        }

        mark {
            background: #ff0;
            color: #000
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sup {
            top: -0.5em
        }

        sub {
            bottom: -0.25em
        }

        img {
            border: 0
        }

        svg:not(:root) {
            overflow: hidden
        }

        figure {
            margin: 1em 40px
        }

        hr {
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 0
        }

        pre {
            overflow: auto
        }

        code,
        kbd,
        pre,
        samp {
            font-family: monospace, monospace;
            font-size: 1em
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            color: inherit;
            font: inherit;
            margin: 0
        }

        button {
            overflow: visible
        }

        button,
        select {
            text-transform: none
        }

        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"] {
            -webkit-appearance: button;
            cursor: pointer
        }

        button[disabled],
        html input[disabled] {
            cursor: default
        }

        button::-moz-focus-inner,
        input::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        input {
            line-height: normal
        }

        input[type="checkbox"],
        input[type="radio"] {
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            height: auto
        }

        input[type="search"] {
            -webkit-appearance: textfield;
            -moz-box-sizing: content-box;
            box-sizing: content-box
        }

        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-decoration {
            -webkit-appearance: none
        }

        fieldset {
            border: 1px solid #c0c0c0;
            margin: 0 2px;
            padding: 0.35em 0.625em 0.75em
        }

        legend {
            border: 0;
            padding: 0
        }

        textarea {
            overflow: auto
        }

        optgroup {
            font-weight: bold
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        td,
        th {
            padding: 0
        }

        html {
            font-size: 12px;
            line-height: 1.5;
            color: #000;
            background: #ddd;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 6rem auto 0;
            max-width: 800px;
            background: white;
            border: 1px solid #aaa;
            padding: 2rem
        }

        .container {
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem
        }

        *,
        *:before,
        *:after {
            -moz-box-sizing: inherit;
            box-sizing: inherit
        }

        [contenteditable]:hover,
        [contenteditable]:focus,
        input:hover,
        input:focus {
            background: rgba(241, 76, 76, 0.1);
            outline: 1px solid #009688
        }

        .group:after,
        .row:after,
        .invoicelist-footer:after {
            content: "";
            display: table;
            clear: both
        }

        a {
            color: #009688;
            text-decoration: none
        }

        p {
            margin: 0
        }

        .row {
            position: relative;
            display: block;
            width: 100%;
            font-size: 0
        }

        .col,
        .logoholder,
        .me,
        .info,
        .bank,
        [class*="col-"] {
            vertical-align: top;
            display: inline-block;
            font-size: 1rem;
            padding: 0 1rem;
            min-height: 1px
        }

        .col-4 {
            width: 25%
        }

        .col-3 {
            width: 33.33%
        }

        .col-2 {
            width: 50%
        }

        .col-2-4 {
            width: 75%
        }

        .col-1 {
            width: 100%
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .control-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            background: #009688;
            color: white;
            line-height: 4rem;
            height: 4rem
        }

        .control-bar .slogan {
            font-weight: bold;
            font-size: 1.2rem;
            display: inline-block;
            margin-right: 2rem
        }

        .control-bar label {
            margin-right: 1rem
        }

        .control-bar a {
            margin: 0;
            padding: .5em 1em;
            background: rgba(255, 255, 255, 0.8)
        }

        .control-bar a:hover {
            background: #fff
        }

        .control-bar input {
            border: none;
            background: rgba(255, 255, 255, 0.2);
            padding: .5rem 0;
            max-width: 30px;
            text-align: center
        }

        .control-bar input:hover {
            background: rgba(255, 255, 255, 0.3)
        }

        .hidetax .taxrelated {
            display: none
        }

        .showtax .notaxrelated {
            display: none
        }

        .hidedate .daterelated {
            display: none
        }

        .showdate .notdaterelated {
            display: none
        }

        header {
            margin: 1rem 0 0;
            padding: 0 0 2rem 0;
            border-bottom: 3pt solid #009688
        }

        header p {
            font-size: .9rem
        }

        header a {
            color: #000
        }

        .logo {
            margin: 0 auto;
            width: auto;
            height: auto;
            border: none;
            fill: #009688
        }

        .logoholder {
            width: 8%
        }

        .me {
            width: 20%
        }

        .info {
            width: 30%
        }

        .bank {
            width: 36%
        }

        .section {
            margin: 2rem 0 0
        }

        .smallme {
            display: inline-block;
            text-transform: uppercase;
            margin: 0 0 2rem 0;
            font-size: .9rem
        }

        .client {
            margin: 0 0 3rem 0
        }

        h1 {
            margin: 0;
            padding: 0;
            font-size: 2rem;
            color: #009688
        }

        .details input {
            display: inline;
            margin: 0 0 0 .5rem;
            border: none;
            width: 50px;
            min-width: 0;
            background: transparent;
            text-align: left
        }


        .invoice_detail {
            border: solid 1px #009688;
            padding: 10px;
            height: 25px;
            text-align: center
        }

        .rate:before,
        .price:before,
        .sum:before,
        .tax:before,
        #total_price:before,
        #total_tax:before {
            content: '$'
        }

        .invoicelist-body {
            margin: 1rem
        }

        .invoicelist-body table {
            width: 100%
        }

        .invoicelist-body thead {
            text-align: left;
            border-bottom: 1pt solid #666
        }

        .invoicelist-body td,
        .invoicelist-body th {
            position: relative;
            padding: 1rem
        }

        .invoicelist-body tr:nth-child(even) {
            background: #ccc
        }

        .invoicelist-body tr:hover .removeRow {
            display: block
        }

        .invoicelist-body input {
            display: inline;
            margin: 0;
            border: none;
            width: 80%;
            min-width: 0;
            background: transparent;
            text-align: left
        }

        .invoicelist-body .control {
            display: inline-block;
            color: white;
            background: #009688;
            padding: 3px 7px;
            font-size: .9rem;
            text-transform: uppercase;
            cursor: pointer
        }

        .invoicelist-body .control:hover {
            background: #f36464
        }

        .invoicelist-body .newRow {
            margin: .5rem 0;
            float: left
        }

        .invoicelist-body .removeRow {
            display: none;
            position: absolute;
            top: .1rem;
            bottom: .1rem;
            left: -1.3rem;
            font-size: .7rem;
            border-radius: 3px 0 0 3px;
            padding: .5rem
        }

        .invoicelist-footer {
            margin: 1rem
        }

        .invoicelist-footer table {
            float: right;
            width: 25%
        }

        .invoicelist-footer table td {
            padding: 1rem 2rem 0 1rem;
            text-align: right
        }

        .invoicelist-footer table tr:nth-child(2) td {
            padding-top: 0
        }

        .invoicelist-footer table #total_price {
            font-size: 2rem;
            color: #009688
        }

        .note {
            margin: 1rem
        }

        .hidenote .note {
            display: none
        }

        .note h2 {
            margin: 0;
            font-size: 1rem;
            font-weight: bold
        }

        footer {
            display: block;
            margin: 1rem 0;
            padding: 1rem 0 0
        }

        footer p {
            font-size: .8rem
        }

        @media print {
            html {
                margin: 0;
                padding: 0;
                background: #fff
            }

            body {
                width: 100%;
                border: none;
                background: #fff;
                color: #000;
                margin: 0;
                padding: 0
            }

            .control,
            .control-bar {
                display: none !important
            }

            [contenteditable]:hover,
            [contenteditable]:focus {
                outline: none
            }
        }


        /*# sourceMappingURL=main.css.map */
    </style>
</head>

<body>
    <div class="control-bar">
        <div class="container">
            <div class="row">
                <div class="col-2-4">
                    <div class="slogan">Facturación </div>

                    <label for="config_tax">IVA:
                        <input type="checkbox" id="config_tax" />
                    </label>
                    <label for="config_tax_rate" class="taxrelated">Tasa:
                        <input type="text" id="config_tax_rate" value="13" />%
                    </label>
                    <label for="config_note">Nota:
                        <input type="checkbox" id="config_note" />
                    </label>

                </div>
                <div class="col-4 text-right">
                    <a href="javascript:window.print()">Imprimir</a>
                </div>
                <!--.col-->
            </div>
            <!--.row-->
        </div>
        <!--.container-->
    </div>
    <!--.control-bar-->

    <header class="row">
        <div class="logoholder text-center">
            <img height="50" weight="50"
                src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/619b3b67355387.5b3667ff88b41.png">
        </div>
        <!--.logoholder-->

        <div class="me">
            <p contenteditable>
                <strong>Sistema Web S.A. de C.V.</strong><br>
                234/90, New York Street<br>
                United States.<br>

            </p>
        </div>
        <!--.me-->

        <div class="info">
            <p contenteditable>
                Web: <a href="http://volkerotto.net">www.sistemasweb.la</a><br>
                E-mail: <a href="mailto:info@obedalvarado.pw">info@obedalvarado.pw</a><br>
                Tel: +456-345-908-559<br>
                Twitter: @alvarado_obed
            </p>
        </div><!-- .info -->

        <div class="info">
            <p contenteditable>
                Datos bacarios: <br>
                Titular de la cuenta: <br>
                IBAN: <br>
                BIC:
            </p>
        </div>
        <!--.bank-->

    </header>


    <div class="row section">

        <div class="col-2">
            <h1 contenteditable>Factura</h1>
        </div>
        <!--.col-->

        <div class="col-2 text-right details">
            <p contenteditable>
                Fecha: <input type="text" class="datePicker" /><br>
                Factura #: <input type="text" value="100" /><br>
                Vence: <input class="twoweeks" type="text" />
            </p>
        </div>
        <!--.col-->



        <div class="col-2">


            <p contenteditable class="client">
                <strong>Facturar a</strong><br>
                [Nombre cliente]<br>
                [Nombre emmpresa]<br>
                [Dirección empresa]<br>
                [Tel empresa]
            </p>
        </div>
        <!--.col-->


        <div class="col-2">


            <p contenteditable class="client">
                <strong>Enviar a</strong><br>
                [Nombre cliente]<br>
                [Nombre emmpresa]<br>
                [Dirección empresa]<br>
                [Tel empresa]
            </p>
        </div>
        <!--.col-->



    </div>
    <!--.row-->

    <div class="row section" style="margin-top:-1rem">
        <div class="col-1">
            <table style='width:100%'>
                <thead contenteditable>
                    <tr class="invoice_detail">
                        <th width="25%" style="text-align">Vendedor</th>
                        <th width="25%">Orden de compra </th>
                        <th width="20%">Enviar por</th>
                        <th width="30%">Términos y condiciones</th>
                    </tr>
                </thead>
                <tbody contenteditable>
                    <tr class="invoice_detail">
                        <td width="25%" style="text-align">John Doe</td>
                        <td width="25%">#PO-2020 </td>
                        <td width="20%">DHL</td>
                        <td width="30%">Pago al contado</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!--.row-->

    <div class="invoicelist-body">
        <table>
            <thead contenteditable>
                <th width="5%">Código</th>
                <th width="60%">Descripción</th>

                <th width="10%">Cant.</th>
                <th width="15%">Precio</th>
                <th class="taxrelated">IVA</th>
                <th width="10%">Total</th>
            </thead>
            <tbody>
                <tr>
                    <td width='5%'><a class="control removeRow" href="#">x</a> <span
                            contenteditable>12345</span></td>
                    <td width='60%'><span contenteditable>Descripción</span></td>
                    <td class="amount"><input type="text" value="1" /></td>
                    <td class="rate"><input type="text" value="99" /></td>
                    <td class="tax taxrelated"></td>
                    <td class="sum"></td>
                </tr>
            </tbody>
        </table>
        <a class="control newRow" href="#">+ Nueva fila</a>
    </div>
    <!--.invoice-body-->

    <div class="invoicelist-footer">
        <table contenteditable>
            <tr class="taxrelated">
                <td>IVA:</td>
                <td id="total_tax"></td>
            </tr>
            <tr>
                <td><strong>Total:</strong></td>
                <td id="total_price"></td>
            </tr>
        </table>
    </div>

    <div class="note" contenteditable>
        <h2>Nota:</h2>
    </div>
    <!--.note-->

    <footer class="row">
        <div class="col-1 text-center">
            <p class="notaxrelated" contenteditable>El monto de la factura no incluye el impuesto sobre las ventas.</p>

        </div>
    </footer>

</body>

</html>
{{-- https://obedalvarado.pw/blog/crear-facturas-de-venta-con-html-css-y-javascript/ --}}
