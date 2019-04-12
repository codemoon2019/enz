@push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">
<style>
    #section-list{
        margin: 0px;
        padding: 5px 15px;
    }
    #section-list li{
        /*background-color: #ffffff;*/
        margin: 0px;
        margin-bottom: 1px;
        color: #455775;
        font-weight: bold;
        cursor: move;
        list-style: none;
        border: 1px solid #d6d6d6;
        padding: 7px 10px;
    }
    #section-list li i{    
    	float: right;
	    cursor: pointer;
	    padding: 11px 10px;
	    margin-top: -7px;
    }
    #section-list li i:hover{
    	color: red;
    }
    #section-list li:hover{
    	background-color: #c5c5c5;
    	color: white;
    }
    .add-btn{
    	padding: 6px 13px;
	    background-color: #cccccc;
	    border: 1px solid #afafaf;
    }

    .content{
        margin: 0px;
        padding: 0px;
    }
    .content li{
        list-style: none;
        padding: 5px;
        margin-bottom: 10px;
    }

    .title{
        padding: 6px 10px;
        background-color: #d2d2d2;
        font-weight: bold;
        cursor: move;
    }

    .active-section-content{
        display: block;
    }

    .active-section{
        background-color: #3d5867;
        color: white !important;
    }
    .dz-image img{
        height: 120px;
        object-fit: cover;
    }
    .status-div{
        float: right;
        margin-top: 2px;
    }
    .status-div label{
        position: absolute;
        right: 50px;
        margin-top: -2px;
    }

    /*New*/
    
    .delete-template{
        float: right;
        color: red;
        cursor: pointer;
        margin-top: 4px;    
    }

    /*dropzone margin*/
     .img-with-text{
        margin-top: 75px;
        height: 200px;
     }

    /*image with text*/
    .img-with-text-div{
        display: flex; padding: 10px;
    }
    .img-thum{
        width: 160px;
        position: relative;
        height: 122px;
        top: 8px;
    }
    .img-thum img{
        object-fit: cover; 
        box-shadow: 0px 0px 1px 1px #a7a4a4;
        width: 100%; height: 100%;
        border-radius: 3px;

    }
    .img-input-text{
        width: 100%; padding: 7px 0px;
    }

    .img-input-text input{
        margin-bottom: 5px;
    }

    .actual-image-holder{
        display: none;
    }

    .image-area{
        position: absolute;
        left: 250px;
        margin-top: -23px;
    }
    
    .image-align{
        position: absolute;
        left: 150px;
        margin-top: -23px;
    }

</style>
@endpush