

        <!-- start: Content -->
        <div id="content" class="span10">


            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.php">Anasayfa</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <i class="icon-book"></i>
                    <a href="?page=dersler">Dersler</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <i class="icon-edit"></i>
                    <a href="#">Ders Ekle</a>
                </li>
            </ul>

            <div class="row-fluid sortable">
                <div class="box span12">



                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Ders Ekle</h2>

                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">

                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">Ders Adý</label>
                                    <div class="controls">
                                        <input class="input-xlarge"  placeholder="Ders Adý Giriniz" type="text" value="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="selectError">Öðretim Görevlisi Seçiniz</label>
                                    <div class="controls">
                                        <select id="selectError" data-rel="chosen">
                                            <option value="1">Matematik</option>
                                            <option value="2">Fizik</option>
                                            <option value="3">Görsel Programlama</option>
                                            <option value="4">Yapýsal Programlama</option>
                                            <option value="5">Veri Tabaný Yönetim Sistemleri</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="control-group hidden-phone">
                                    <label class="control-label" for="textarea2">Ders Açýklamasý</label>
                                    <div class="controls">
                                        <textarea class="cleditor" id="textarea2" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                    <button type="reset" class="btn">Ýptal</button>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div><!--/span-->

            </div><!--/row-->




        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->
