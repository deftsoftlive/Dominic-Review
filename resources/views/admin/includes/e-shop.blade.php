                <li class="nav-item pcoded-menu-caption">
                    <label>E-Shop</label>
                </li>

               
                



              <li class="nav-item {{ \Request::route()->getName() === 'admin.products.category'
             ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{url(route('admin.products.category'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">Product Categories</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu <?= ActiveMenu([
                        'admin.products.variation',
                        'admin.products.create.variations',
                        'admin.products.variations',
                        'admin.products.custom.fields.variations',
                        'admin.products.custom.fields.edit.variations',
                        'admin.products.variation.edit',
                        'admin.products.edit.variations'
                ],'pcoded-trigger') ?>" >
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                         <i class="feather icon-box"></i></span><span class="pcoded-mtext">Product Variations</span></a>

                       <ul class="pcoded-submenu" style="display: <?= ActiveMenu([
                        'admin.products.variation',
                        'admin.products.create.variations',
                        'admin.products.variations',
                        'admin.products.custom.fields.variations',
                        'admin.products.custom.fields.edit.variations',
                        'admin.products.variation.edit',
                        'admin.products.edit.variations',
                        'admin.products.list.brands'
                        ],'block') ?>;">

                         <li class="<?= ActiveMenu(['admin.products.list.brands'],'active') ?>">
                              <a href="{{ route('admin.products.list.brands') }}" class="">Brand</a>
                        </li>
                                 
                                 <li class="<?= ActiveMenu(['admin.products.create.variations'],'active') ?>">
                                      <a href="{{ route('admin.products.create.variations') }}" class="">Add New Variations</a>
                                </li>

                                <?php $variationMenus = App\Models\Products\Variation::where('status',1)->orderBy('name','ASC')->get(); ?>

                                @foreach($variationMenus as $v)
                                    <li>
                                           <a href="{{ route('admin.products.variations',$v->type) }}" class="">{{$v->name}}</a>
                                   </li>
                                @endforeach
                                
                      </ul>
                </li>

               <li class="nav-item {{ \Request::route()->getName() === 'admin.shop.listing'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.shop.listing'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">Shop Listing</span></a>
                </li>
                <li class="nav-item {{ \Request::route()->getName() === 'admin.shop.products.all.listing'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.shop.products.all.listing',5))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">Product Listing</span></a>
                </li>

                <li class="nav-item {{ \Request::route()->getName() === 'admin.shop.cms'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.shop.cms'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">CMS Pages</span></a>
                </li>