 <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">

                   @csrf
                 
                        {{select3($errors,'Parent','parent','label','0',$parent,$category->parent)}}
                        {{select3($errors,'SubParent','subparent','label','0',$subparent,$category->subparent)}}
                        {{textbox($errors,'Name*','label',$category->label)}}
         

 

                          {{choosefilemultiple($errors,'Image','image')}}


                          <script type="text/javascript">
                                     $('#image').fileinput({
                                              browseClass: "btn btn-primary btn-block",
                                             
                                              
                                              showCaption: false,
                                              showRemove: false,
                                              showUpload: false,
                                              initialPreview: [
                                                 <?php if($category->image != ""): ?>
                                                        "<img src='{{url('/'.$category->image)}}'>",
                                                 <?php endif; ?>
                                              ],
                                              initialPreviewConfig: [

                                                <?php if($category->image != ""): ?>
                                                        {
                                                          'caption' : 'product_image',
                                                          'url' : '<?= url(route('delete_category_image',$category->id)) ?>',
                                                          'key'     : '<?= $category->id ?>'
                                                        },
                                               <?php endif; ?>

                                              ]
                                });
                   </script>


                       


                        <div class="form-group" >

                                <label>Featured | Not</label>

                                <select class="form-control" name="featured">
                                  <option value="0" {{$category->featured == 0 ? 'selected' : ''}}>Unfeatured</option>
                                  <option value="1" {{$category->featured == 1 ? 'selected' : ''}}>Featured</option>
                                </select>
                        </div>

                        {{textbox($errors,'Meta Title*','meta_title',$category->meta_title)}}
                        {{textbox($errors,'Meta Tags*','meta_tag',$category->meta_tag)}}
                        {{textarea($errors,'Meta description*','meta_description',$category->meta_description)}}




                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
 </form>