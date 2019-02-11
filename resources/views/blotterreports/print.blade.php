<style>
    body{
        font-family: "Arial";
    }
    div.document-header{
        text-align: center;
    }
    h2.title{
        text-align: center;
    }

    div.line-container{
        display:block;
    }
    div.block-label{
        display: inline-block;
        margin-right: 25px;
    }
    .line-container label{
        margin-right: 25px;
    }
    .image-container{
        position: absolute;
        top: 176px;
        right: 20px;
    }

    .image-container img{
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    div.document-header{
        position: relative;
        top:0;
        left:0;
    }
    img.header-logo.left{
        position: absolute;
        top: 0;
        left:150px;
    }
    img.header-logo.right{
        position: absolute;
        top: 0;
        right:150px;
    }
    div.wrapper{
        height: 100%;
        background-image: url('/res/photos/map-assets/new-lucena-pnp-logo-bnw.jpg');
        background-repeat:no-repeat;
        background-size: auto 75%;
        background-position: 100px;
        padding-top: 3%;
        padding-bottom: 3%;


    }

    div.content{
        margin-top:100px;
    }

    div.content p{
        margin-left:50px;
    }

    p.bottom-clear{
        margin-bottom: 0px;
    }
    p.top-clear{
        margin-top:0px;
    }

    p.bigger{
        font-size:20px; 
        text-decoration: underline;
    }
    div.signable{
        display: inline;
        margin-right: 200px;
    }
</style>
<p>{!!$report->paragraphNarrative()!!}</p>