<?php
include "backend/functions.php";


$user = $_SESSION['name'];
//$secret = $_SESSION['secret'];
$id = $_SESSION['id'];
require_once 'PHPGangsta/GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();

// Controleer of iemand ingelogd is
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
Changepassword();
Updateuser();
UploadPic1();
UpdateCompanyInfo();
$rowC = GetCompanyInfo();
InsertNotes();
EditNNote();
EditNoteExtra();


?>
<!DOCTYPE html>
<html class="loading" lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<style>
    .kip1 {
        float:right;
        width: fit-content;
    }
    /*.num1 {*/
    /*    background-color: yellow;*/
    /*    width: 100%;*/
    /*}*/
    .comment5 {
        border: 1px solid transparent;
        float: left;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 5px;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, 0.125);
        border-radius: 0.35rem;
        padding-bottom: 5px;
    }
    .comment5 h4,
    .comment5 span,
    .darker h4,
    .darker span {
        display: inline;
    }

    .navbar-nav {
        width: 100%
    }

    @media(min-width:568px) {
        .end {
            margin-left: auto
        }
    }

    @media(max-width:768px) {
        #post {
            width: 100%
        }
    }

    #clicked {
        padding-top: 1px;
        padding-bottom: 1px;
        text-align: center;
        width: 100%;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px
    }

    #profile {
        background-color: unset
    }

    #post {
        margin: 10px;
        padding: 6px;
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: center;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px;
        width: 50%
    }

    body {
        background-color: black
    }

    #nav-items li a,
    #profile {
        text-decoration: none;
        color: rgb(224, 219, 219);
        background-color: black
    }

    .comments {
        margin-top: 5%;
        margin-left: 20px
    }

    .darker {
        border: 1px solid #ecb21f;
        background-color: black;
        float: right;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px
    }

    .comment {
        border: 1px solid transparent;
        float: left;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px
    }

    .comment h4,
    .comment span,
    .darker h4,
    .darker span {
        display: inline
    }

    .comment p,
    .comment span,
    .darker p,
    .darker span {
        color: white;
    }

    h1,
    h4 {
        color: white;
        font-weight: bold
    }

    label {
        color: rgb(212, 208, 208)
    }

    #align-form {
        margin-top: 20px
    }

    .form-group p a {
        color: white
    }

    #checkbx {
        background-color: black
    }

    #darker img {
        margin-right: 15px;
        position: static
    }

    .widget .panel-body {
        padding: 0
    }

    .widget .list-group {
        margin-bottom: 0
    }

    .widget .panel-title {
        display: inline
    }

    .widget .label-info {
        float: right
    }
    html body.layout-dark.layout-transparent .list-group .list-group-item {
        border-color: black!important;
    }
    .widget li.list-group-item {
        border-radius: 0;
        border: 0;
        border-top: 1px solid #ddd
    }

    .widget li.list-group-item:hover {
        background-color: rgba(86, 61, 124, .1)
    }

    .widget .mic-info {
        color: #666;
        font-size: 15px
    }

    .widget .action {
        margin-top: 5px
    }

    .widget .comment-text {
        font-size: 12px;
        color: black;
    }

    .widget .btn-block {
        border-top-left-radius: 0;
        border-top-right-radius: 0
    }

    [hidden] {
        display: none
    }

    html {
        font-family: sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%
    }

    body {
        margin: 0
    }

    a:focus {
        outline: thin dotted
    }

    a:active, a:hover {
        outline: 0
    }

    h1 {
        margin: .67em 0;
        font-size: 2em
    }

    img {
        border: 0
    }

    button {
        margin: 0;
        font-family: inherit;
        font-size: 100%
    }

    button {
        line-height: normal
    }

    button {
        text-transform: none
    }

    button {
        cursor: pointer;
        -webkit-appearance: button
    }

    button[disabled] {
        cursor: default
    }

    button::-moz-focus-inner {
        padding: 0;
        border: 0
    }

    @media print {
        * {
            color: #000 !important;
            text-shadow: none !important;
            background: 0 0 !important;
            box-shadow: none !important
        }

        a, a:visited {
            text-decoration: underline
        }

        a[href]:after {
            content: " (" attr(href) ")"
        }

        a[href^="#"]:after, a[href^="javascript:"]:after {
            content: ""
        }

        img {
            page-break-inside: avoid
        }

        img {
            max-width: 100% !important
        }

        @page {
            margin: 2cm .5cm
        }

        h2, h3 {
            orphans: 3;
            widows: 3
        }

        h2, h3 {
            page-break-after: avoid
        }

        .label {
            border: 1px solid #000
        }
    }

    *, :after, :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    html {
        font-size: 62.5%;
        -webkit-tap-highlight-color: transparent
    }

    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 1.428571429;
        color: #333;
        background-color: #fff
    }

    button {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit
    }

    button {
        background-image: none
    }

    a {
        color: #428bca;
        text-decoration: none
    }

    a:focus, a:hover {
        color: #2a6496;
        text-decoration: underline
    }

    a:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px
    }

    img {
        vertical-align: middle
    }

    .img-responsive {
        display: block;
        max-width: 100%;
    }

    .img-circle {
        border-radius: 50%
    }

    .text-primary {
        color: #428bca
    }

    .text-danger {
        color: #b94a48
    }

    .text-success {
        color: #468847
    }

    .text-info {
        color: #3a87ad
    }

    .text-left {
        text-align: left
    }

    .text-right {
        text-align: right
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 500;
        line-height: 1.1
    }

    h1, h2, h3 {
        margin-top: 20px;
        margin-bottom: 10px
    }

    h4, h5, h6 {
        margin-top: 10px;
        margin-bottom: 10px
    }

    .h1, h1 {
        font-size: 36px
    }

    .h2, h2 {
        font-size: 30px
    }

    .h3, h3 {
        font-size: 24px
    }

    .h4, h4 {
        font-size: 18px
    }

    .h5, h5 {
        font-size: 14px
    }

    .h6, h6 {
        font-size: 12px
    }

    ul {
        margin-top: 0;
        margin-bottom: 10px
    }

    ul ul {
        margin-bottom: 0
    }

    .list-inline {
        padding-left: 0;
        list-style: none
    }

    .list-inline > li {
        display: inline-block;
        padding-right: 5px;
        padding-left: 5px
    }

    .container1 {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }

    .container1:after, .container1:before {
        display: table;
        content: " "
    }

    .container1:after {
        clear: both
    }

    .container1:after, .container1:before {
        display: table;
        content: " "
    }

    .container1:after {
        clear: both
    }

    .row1 {
        margin-right: -15px;
        margin-left: -15px
    }

    .row1:after, .row1:before {
        display: table;
        content: " "
    }

    .row1:after {
        clear: both
    }

    .row1:after, .row1:before {
        display: table;
        content: " "
    }

    .row1:after {
        clear: both
    }

    .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px
    }

    .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        float: left
    }

    .col-xs-1 {
        width: 8.333333333333332%
    }

    .col-xs-2 {
        width: 16.666666666666664%
    }

    .col-xs-3 {
        width: 25%
    }

    .col-xs-4 {
        width: 33.33333333333333%
    }

    .col-xs-5 {
        width: 41.66666666666667%
    }

    .col-xs-6 {
        width: 50%
    }

    .col-xs-7 {
        width: 58.333333333333336%
    }

    .col-xs-8 {
        width: 66.66666666666666%
    }

    .col-xs-9 {
        width: 75%
    }

    .col-xs-10 {
        width: 83.33333333333334%
    }

    .col-xs-11 {
        width: 91.66666666666666%
    }

    .col-xs-12 {
        width: 100%
    }

    @media (min-width: 768px) {
        .container1 {
            max-width: 750px
        }

        .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
            float: left
        }

        .col-sm-1 {
            width: 8.333333333333332%
        }

        .col-sm-2 {
            width: 16.666666666666664%
        }

        .col-sm-3 {
            width: 25%
        }

        .col-sm-4 {
            width: 33.33333333333333%
        }

        .col-sm-5 {
            width: 41.66666666666667%
        }

        .col-sm-6 {
            width: 50%
        }

        .col-sm-7 {
            width: 58.333333333333336%
        }

        .col-sm-8 {
            width: 66.66666666666666%
        }

        .col-sm-9 {
            width: 75%
        }

        .col-sm-10 {
            width: 83.33333333333334%
        }

        .col-sm-11 {
            width: 91.66666666666666%
        }

        .col-sm-12 {
            width: 100%
        }
    }

    @media (min-width: 992px) {
        .container1 {
            max-width: 970px
        }

        .col-md-1, .col-md-10, .col-md-11, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
            float: left
        }

        .col-md-1 {
            width: 8.333333333333332%
        }

        .col-md-2 {
            width: 16.666666666666664%
        }

        .col-md-3 {
            width: 25%
        }

        .col-md-4 {
            width: 33.33333333333333%
        }

        .col-md-5 {
            width: 41.66666666666667%
        }

        .col-md-6 {
            width: 50%
        }

        .col-md-7 {
            width: 58.333333333333336%
        }

        .col-md-8 {
            width: 66.66666666666666%
        }

        .col-md-9 {
            width: 75%
        }

        .col-md-10 {
            width: 83.33333333333334%
        }

        .col-md-11 {
            width: 91.66666666666666%
        }

        .col-md-12 {
            width: 100%
        }
    }

    @media (min-width: 1200px) {
        .container1 {
            max-width: 1170px
        }
    }

    label {
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 700
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.428571429;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none
    }

    .btn:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px
    }

    .btn:focus, .btn:hover {
        color: #333;
        text-decoration: none
    }

    .btn:active {
        background-image: none;
        outline: 0;
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)
    }

    .btn[disabled] {
        pointer-events: none;
        cursor: not-allowed;
        opacity: .65;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc
    }

    .btn-default:active, .btn-default:focus, .btn-default:hover {
        color: #333;
        background-color: #ebebeb;
        border-color: #adadad
    }

    .btn-default:active {
        background-image: none
    }

    .btn-default[disabled], .btn-default[disabled]:active, .btn-default[disabled]:focus, .btn-default[disabled]:hover {
        background-color: #fff;
        border-color: #ccc
    }

    .btn-primary {
        color: #fff;
        background-color: #428bca;
        border-color: #357ebd
    }

    .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
        color: #fff;
        background-color: #3276b1;
        border-color: #285e8e
    }

    .btn-primary:active {
        background-image: none
    }

    .btn-primary[disabled], .btn-primary[disabled]:active, .btn-primary[disabled]:focus, .btn-primary[disabled]:hover {
        background-color: #428bca;
        border-color: #357ebd
    }

    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a
    }

    .btn-danger:active, .btn-danger:focus, .btn-danger:hover {
        color: #fff;
        background-color: #d2322d;
        border-color: #ac2925
    }

    .btn-danger:active {
        background-image: none
    }

    .btn-danger[disabled], .btn-danger[disabled]:active, .btn-danger[disabled]:focus, .btn-danger[disabled]:hover {
        background-color: #d9534f;
        border-color: #d43f3a
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c
    }

    .btn-success:active, .btn-success:focus, .btn-success:hover {
        color: #fff;
        background-color: #47a447;
        border-color: #398439
    }

    .btn-success:active {
        background-image: none
    }

    .btn-success[disabled], .btn-success[disabled]:active, .btn-success[disabled]:focus, .btn-success[disabled]:hover {
        background-color: #5cb85c;
        border-color: #4cae4c
    }

    .btn-info {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da
    }

    .btn-info:active, .btn-info:focus, .btn-info:hover {
        color: #fff;
        background-color: #39b3d7;
        border-color: #269abc
    }

    .btn-info:active {
        background-image: none
    }

    .btn-info[disabled], .btn-info[disabled]:active, .btn-info[disabled]:focus, .btn-info[disabled]:hover {
        background-color: #5bc0de;
        border-color: #46b8da
    }

    .btn-link {
        font-weight: 400;
        color: #428bca;
        cursor: pointer;
        border-radius: 0
    }

    .btn-link, .btn-link:active, .btn-link[disabled] {
        background-color: transparent;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .btn-link, .btn-link:active, .btn-link:focus, .btn-link:hover {
        border-color: transparent
    }

    .btn-link:focus, .btn-link:hover {
        color: #2a6496;
        text-decoration: underline;
        background-color: transparent
    }

    .btn-link[disabled]:focus, .btn-link[disabled]:hover {
        color: #999;
        text-decoration: none
    }

    .btn-sm, .btn-xs {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
    }

    .btn-xs {
        padding: 1px 5px
    }

    .btn-block {
        display: block;
        width: 100%;
        padding-right: 0;
        padding-left: 0
    }

    .btn-block + .btn-block {
        margin-top: 5px
    }

    @font-face {
        font-family: 'Glyphicons Halflings';
        src: url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.eot);
        src: url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'), url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.woff) format('woff'), url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.ttf) format('truetype'), url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular) format('svg')
    }

    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        -webkit-font-smoothing: antialiased;
        font-style: normal;
        font-weight: 400;
        line-height: 1
    }

    .glyphicon-pencil:before {
        content: "\270f"
    }

    .glyphicon-ok:before {
        content: "\e013"
    }

    .glyphicon-trash:before {
        content: "\e020"
    }

    .glyphicon-refresh:before {
        content: "\e031"
    }

    .glyphicon-list-alt:before {
        content: "\e032"
    }

    .glyphicon-tag:before {
        content: "\e041"
    }

    .glyphicon-font:before {
        content: "\e047"
    }

    .glyphicon-list:before {
        content: "\e056"
    }

    .glyphicon-picture:before {
        content: "\e060"
    }

    .glyphicon-edit:before {
        content: "\e065"
    }

    .glyphicon-ok-circle:before {
        content: "\e089"
    }

    .glyphicon-comment:before {
        content: "\e111"
    }

    .glyphicon-link:before {
        content: "\e144"
    }

    .btn-group {
        position: relative;
        display: inline-block;
        vertical-align: middle
    }

    .btn-group > .btn {
        position: relative;
        float: left
    }

    .btn-group > .btn:active, .btn-group > .btn:focus, .btn-group > .btn:hover {
        z-index: 2
    }

    .btn-group > .btn:focus {
        outline: 0
    }

    .btn-group .btn + .btn, .btn-group .btn + .btn-group, .btn-group .btn-group + .btn, .btn-group .btn-group + .btn-group {
        margin-left: -1px
    }

    .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
        border-radius: 0
    }

    .btn-group > .btn:first-child {
        margin-left: 0
    }

    .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0
    }

    .btn-group > .btn:last-child:not(:first-child) {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0
    }

    .btn-group > .btn-group {
        float: left
    }

    .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
        border-radius: 0
    }

    .btn-group > .btn-group:first-child > .btn:last-child, .btn-group > .btn-group:first-child > .dropdown-toggle {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0
    }

    .btn-group > .btn-group:last-child > .btn:first-child {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0
    }

    .btn-group-xs > .btn {
        padding: 5px 10px;
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
    }

    .btn-group-sm > .btn {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
    }

    .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em
    }

    .label[href]:focus, .label[href]:hover {
        color: #fff;
        text-decoration: none;
        cursor: pointer
    }

    .label:empty {
        display: none
    }

    .label-default {
        background-color: #999
    }

    .label-default[href]:focus, .label-default[href]:hover {
        background-color: grey
    }

    .label-primary {
        background-color: #428bca
    }

    .label-primary[href]:focus, .label-primary[href]:hover {
        background-color: #3071a9
    }

    .label-success {
        background-color: #5cb85c
    }

    .label-success[href]:focus, .label-success[href]:hover {
        background-color: #449d44
    }

    .label-info {
        background-color: #5bc0de
    }

    .label-info[href]:focus, .label-info[href]:hover {
        background-color: #31b0d5
    }

    .label-danger {
        background-color: #d9534f
    }

    .label-danger[href]:focus, .label-danger[href]:hover {
        background-color: #c9302c
    }

    @-webkit-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0
        }
        to {
            background-position: 0 0
        }
    }

    @-moz-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0
        }
        to {
            background-position: 0 0
        }
    }

    @-o-keyframes progress-bar-stripes {
        from {
            background-position: 0 0
        }
        to {
            background-position: 40px 0
        }
    }

    @keyframes progress-bar-stripes {
        from {
            background-position: 40px 0
        }
        to {
            background-position: 0 0
        }
    }

    .list-group {
        padding-left: 0;
        margin-bottom: 20px
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom: 1px solid black;
    }

    .list-group-item:first-child {
        border-top-right-radius: 4px;
        border-top-left-radius: 4px
        border-bottom: 1px solid black;
    }

    .list-group-item:last-child {
        margin-bottom: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px
        border-bottom: 1px solid black;
    }

    a.list-group-item {
        color: #555
    }

    a.list-group-item .list-group-item-heading {
        color: #333
    }

    a.list-group-item:focus, a.list-group-item:hover {
        text-decoration: none;
        background-color: #f5f5f5
    }

    .list-group-item-heading {
        margin-top: 0;
        margin-bottom: 5px
    }

    .list-group-item-text {
        margin-bottom: 0;
        line-height: 1.3
    }

    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05)
    }

    .panel-body {
        padding: 15px
    }

    .panel-body:after, .panel-body:before {
        display: table;
        content: " "
    }

    .panel-body:after {
        clear: both
    }

    .panel-body:after, .panel-body:before {
        display: table;
        content: " "
    }

    .panel-body:after {
        clear: both
    }

    .panel > .list-group {
        margin-bottom: 0
    }

    .panel > .list-group .list-group-item {
        border-width: 1px 0
    }

    .panel > .list-group .list-group-item:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0
    }

    .panel > .list-group .list-group-item:last-child {
        border-bottom: 0
    }

    .panel-heading + .list-group .list-group-item:first-child {
        border-top-width: 0
    }

    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px
    }

    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px
    }

    .panel-title > a {
        color: inherit
    }

    .panel-group .panel {
        margin-bottom: 0;
        overflow: hidden;
        border-radius: 4px
    }

    .panel-group .panel + .panel {
        margin-top: 5px
    }

    .panel-group .panel-heading {
        border-bottom: 0
    }

    .panel-default {
        border-color: #ddd
    }

    .panel-default > .panel-heading {
        color: #333;
        background-color: #f5f5f5;
        border-color: #ddd
    }

    .panel-primary {
        border-color: #428bca
    }

    .panel-primary > .panel-heading {
        color: #fff;
        background-color: #428bca;
        border-color: #428bca
    }

    .panel-success {
        border-color: #d6e9c6
    }

    .panel-success > .panel-heading {
        color: #468847;
        background-color: #dff0d8;
        border-color: #d6e9c6
    }

    .panel-danger {
        border-color: #eed3d7
    }

    .panel-danger > .panel-heading {
        color: #b94a48;
        background-color: #f2dede;
        border-color: #eed3d7
    }

    .panel-info {
        border-color: #bce8f1
    }

    .panel-info > .panel-heading {
        color: #3a87ad;
        background-color: #d9edf7;
        border-color: #bce8f1
    }
</style>
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-static layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
<?php
include "partials/navbar.php";
?>


<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- General Tab -->
                                    <h1>Communicatie</h1>
                                    <a type="button"
                                       class="nav-link d-flex align-items-end"
                                       data-toggle="modal" data-target="#largechicken">
                                        <i class="ft-plus mr-1"></i>
                                        <span class="d-none d-sm-block">Toevoegen</span>
                                    </a>
                                    <div class="tab-pane active" id="general2" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <hr class="mt-1 mt-sm-2">
                                        <div class="container1">
                                            <div class="row1">
                                                <?php ViewNote2(); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

<!--                    </br>-->
<!---->
<!--                    <div class="card">-->
<!--                        <div class="card-content">-->
<!--                            <div class="card-body">-->
<!--                                <div class="tab-content">-->
<!--                                    <h1>Abonnementen</h1>-->
<!--                                    <div class="tab-pane active" id="general" role="tabpanel"-->
<!--                                         aria-labelledby="general-tab">-->
<!--                                        <hr class="mt-1 mt-sm-2">-->
<!--                                        <form method="post">-->
<!--                                            <div class="col-12">-->
<!--                                                <div class="card">-->
<!--                                                    <div class="card-header">-->
<!--                                                        <h4 class="card-title">Swipe hier aan en uit wat je wilt</h4>-->
<!--                                                    </div>-->
<!--                                                    <div class="card-content">-->
<!--                                                        <div class="card-body">-->
<!--                                                            <div class="form-group">-->
<!--                                                                <div class="row">-->
<!--                                                                    <h6 class="col-12 text-bold-400 pl-0">onderwerp1 abbo</h6>-->
<!--                                                                    <div class="col-12 mb-2">-->
<!--                                                                        <div class="custom-control custom-switch custom-control-inline">-->
<!--                                                                            <input id="switch1" type="checkbox" class="custom-control-input" checked>-->
<!--                                                                            <label for="switch1" class="custom-control-label">Postcode checker</label>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <div class="col-12 mb-2">-->
<!--                                                                        <div class="custom-control custom-switch custom-control-inline">-->
<!--                                                                            <input id="switch2" type="checkbox" class="custom-control-input" checked>-->
<!--                                                                            <label for="switch2" class="custom-control-label">automatisch credit getter</label>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <div class="col-12 mb-2">-->
<!--                                                                        <div class="custom-control custom-switch custom-control-inline">-->
<!--                                                                            <input id="switch3" type="checkbox" class="custom-control-input" disabled>-->
<!--                                                                            <label for="switch3" class="custom-control-label">automatisch email sturen wanneer dat kan</label>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <h6 class="col-12 text-bold-400 pl-0 mt-3">applicatie abbo2</h6>-->
<!--                                                                    <div class="col-12 mb-2">-->
<!--                                                                        <div class="custom-control custom-switch custom-control-inline">-->
<!--                                                                            <input id="switch4" type="checkbox" class="custom-control-input" checked>-->
<!--                                                                            <label for="switch4" class="custom-control-label">applicatie abonnement</label>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <div class="col-12 mb-2">-->
<!--                                                                        <div class="custom-control custom-switch custom-control-inline">-->
<!--                                                                            <input id="switch5" type="checkbox" class="custom-control-input" disabled>-->
<!--                                                                            <label for="switch5" class="custom-control-label">super de luxe applicatie abonnement</label>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <div class="col-12 mb-2">-->
<!--                                                                        <div class="custom-control custom-switch custom-control-inline">-->
<!--                                                                            <input id="switch6" type="checkbox" class="custom-control-input" checked>-->
<!--                                                                            <label for="switch6" class="custom-control-label">QCCS internet abonnement</label>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">-->
<!--                                                                        <button type="button" class="btn btn-primary mr-sm-2 mb-1">Opslaan</button>-->
<!--                                                                        <button type="button" class="btn btn-secondary mb-1">annuleren</button>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


                </div>
            </div>
            <!-- END Notification Sidebar-->
            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>
        </div>
    </div>
</div>



<div class="modal fade text-left" id="largechicken" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">Nieuwe Notitie</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="subject">Onderwerp</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Onderwerp" required>
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="basic-form-6">Keuze</label>
                        <select required id="basic-form-6" name="keuze" class="form-control">
                            <option value="" selected disabled>Keuze</option>
                            <option value="Intern">Intern</option>
                            <option value="Extern">Extern</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title1">Beschrijving</label>
                        <textarea class="form-control" id="title1" name="text" rows="9" placeholder="Beschrijving" required></textarea>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn bg-light-secondary" data-dismiss="modal" value="Sluiten">
                    <input type="submit" class="btn btn-primary" name="RegistreetNote" value="Opslaan">
                </div>
            </form>
        </div>
    </div>
</div>



<?php
if(isset($_GET['m'])){ ?>
    <div class="flash-data" data-flashdata="<?php echo $_GET['m'];?>"></div>
<?php } ?>

<?php
if(isset($_GET['u'])){ ?>
    <div class="flash-data3" data-flashdata=""></div>
<?php } ?>

<?php
if(isset($_GET['k'])){ ?>
    <div class="flash-data2" data-flashdata="<?php echo $_GET['k'];?>"></div>
<?php } ?>

<script>
    $('.second').on('click',function(e){
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
            title: 'Weet je het zeker?',
            text: "Als je de notitie verwijderd kan niet terug",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete voor altijd en eeuwig!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;

            }
        })
    })

    const flashdata = $('.flash-data').data('flashdata')
    if(flashdata){
        swal.fire({
            type : 'success',
            title : 'Notitie verwijderd',
            text : 'Ga maar weer verder met werken'
        })
    }
    const flashdata2 = $('.flash-data2').data('flashdata')
    if(flashdata2){
        swal.fire({
            type : 'success',
            title : 'Helemaal top hij is toegevoegd',
            text : 'Ga maar weer verder met werken'
        })
    }
    const flashdata3 = $('.flash-data3').data('flashdata')
    if(flashdata3){
        swal.fire({
            type : 'success',
            title : 'Nou dat is lekker bijgewerkt',
            text : 'Ga maar weer verder met werken'
        })
    }
</script>
</body>

<?php
qron();
qroff();
include "partials/footer.php";
?>
<!-- END : Body-->
</html>