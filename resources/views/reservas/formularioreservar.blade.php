@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')

<div class="container-fluid">
    <section class="box-typical files-manager">

        <div class="files-manager-panel">
            
            <div class="">
                <header class="files-manager-header">
                    <div class="files-manager-header-left">
                        <button type="button" class="btn btn-rounded"><i class="font-icon-left font-icon-upload-2"></i>Upload file</button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-folder"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-download-2"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-share"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-trash"></i></button>
                    </div>
                    <div class="files-manager-header-right">
                        <div class="views">
                            <button type="button" class="btn-icon view active"><i class="font-icon font-icon-view-grid"></i></button>
                            <button type="button" class="btn-icon view"><i class="font-icon font-icon-view-rows"></i></button>
                        </div>
                        <div class="search">
                            <input type="text" class="form-control form-control-rounded" placeholder="Search"/>
                            <button type="submit" class="btn-icon"><i class="font-icon font-icon-search"></i></button>
                        </div>
                    </div>
                </header><!--.files-manager-header-->

                <div class="files-manager-content">
                    <div class="files-manager-content-in scrollable-block">
                        <div class="fm-file-grid">
                            <div class="fm-file selected">
                                <div class="fm-file-icon">
                                    <img src="img/folder.png" alt="">
                                </div>
                                <div class="fm-file-name">App design assets</div>
                                <div class="fm-file-size">7 files, 358 MB</div>
                            </div>
                            <div class="fm-file">
                                <div class="fm-file-icon">
                                    <img src="img/folder.png" alt="">
                                </div>
                                <div class="fm-file-name">Inspiration</div>
                                <div class="fm-file-size">144 files, 52 MB</div>
                            </div>
                            <div class="fm-file">
                                <div class="fm-file-icon">
                                    <img src="img/folder.png" alt="">
                                </div>
                                <div class="fm-file-name">2014_projects.rar</div>
                                <div class="fm-file-size">4 MB</div>
                            </div>
                            <div class="fm-file">
                                <div class="fm-file-icon">
                                    <img src="img/file.png" alt="">
                                </div>
                                <div class="fm-file-name">Inspiration</div>
                                <div class="fm-file-size">7 files, 358 MB</div>
                            </div>
                        </div>
                    </div><!--.files-manager-content-in-->
                </div><!--.files-manager-content-->

                <section class="files-manager-aside">
                    <div class="files-manager-aside-section">
                        <div class="box-typical-header-sm">PSD</div>
                        <div class="info-list">
                            <p>Owner: Mark Osborn</p>
                            <p>Changed: 08.01.2016  12:45</p>
                            <p>Downloaded: 9 times</p>
                            <p>The link was viewed: 83 times</p>
                        </div>
                        <a href="#" class="btn btn-rounded"><i class="font-icon-left font-icon-download-3"></i>Download</a>
                    </div>
                    <div class="files-manager-aside-section">
                        <div class="box-typical-header-sm">Share a folder</div>
                        <input type="text" class="form-control" value="http://yadi.sk/d/kitSdZIXmjnD8"/>
                        <a href="#" class="soc"><i class="font-icon font-icon-fb-fill"></i></a>
                        <a href="#" class="soc"><i class="font-icon font-icon-vk-fill"></i></a>
                        <a href="#" class="soc"><i class="font-icon font-icon-ok-fill"></i></a>
                        <a href="#" class="soc"><i class="font-icon font-icon-tw-fill"></i></a>
                        <a href="#" class="soc"><i class="font-icon font-icon-gp-fill"></i></a>
                    </div>
                </section><!--.files-manager-aside-->
            </div><!--.files-manager-panel-in-->
        </div><!--.files-manager-panels-->
    </section><!--.files-manager-->
</div><!--.container-fluid-->
    










<!--

http://www.forosdelweb.com/f13/obtener-solo-valor-tr-con-onclick-1004289/

-->
    
@endsection