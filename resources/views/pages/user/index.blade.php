@extends('app')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
                            </div>
                            <h3>Ahlan wa sahlan!</h3>
                            <p>Silahkan berbelanja di toko katalog kami.</p>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div> <!-- container-fluid -->

        <div class="container-fluid">
            {{-- filter barang --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolioFilter">
                        <a href="#" data-filter="*" class="waves-effect waves-primary current">Semua</a>
                        <a href="#" data-filter=".buku" class="waves-effect waves-primary">Buku</a>
                        <a href="#" data-filter=".creative" class="waves-effect waves-primary">Seragam</a>
                        {{-- menambahkan kategori disini --}}
                    </div>
                </div>
            </div>

            {{-- list barang --}}
            <div class="port">
                <div class="portfolioContainer">
                    <div class="col-md-6 col-xl-3 col-lg-4 buku">
                        <div class="gal-detail thumb">
                            <div class="text-center">
                                <a href="assets/images/gallery/11.jpg" class="" title="Screenshot-11">
                                    <img src="assets/images/gallery/11.jpg" class="thumb-img img-fluid" alt="work-thumbnail" />
                                </a>
                            </div>
                            <h4 class="font-24">Kitab Al Arabiyyah baina Yadaik</h4>
                            <p style="font-weight: bold" class="font-18">Rp: 90.000</p>
                            <p class="text-right">1rb terjual</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div> <!-- content -->
</div>
@endsection
