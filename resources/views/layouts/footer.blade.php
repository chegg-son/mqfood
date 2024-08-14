{{-- footer section --}}
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> &copy; Created with <i class="mdi mdi-heart text-danger"></i> by IT PIAT 7
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- footer section end --}}

<!--====== Javascripts & Jquery ======-->
<!-- Vendor -->
<script src={{ asset("assets/libs/jquery/jquery.min.js")}}></script>
<script src={{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/libs/simplebar/simplebar.min.js")}}></script>
<script src={{asset("assets/libs/node-waves/waves.min.js")}}></script>
<script src={{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}></script>
<script src={{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}></script>
<script src={{asset("assets/libs/feather-icons/feather.min.js")}}></script>

<!-- knob plugin -->
<script src={{("assets/libs/jquery-knob/jquery.knob.min.js")}}></script>

<!--Morris Chart-->
<script src={{ asset("assets/libs/morris.js06/morris.min.js")}}></script>
<script src={{ asset("assets/libs/raphael/raphael.min.js")}}></script>

<!-- Dashboar init js-->
<script src={{ asset("assets/js/pages/dashboard.init.js")}}></script>

<!-- App js-->
<script src={{ asset("assets/js/app.min.js")}}></script>
</div> <!-- wrapper end -->

</body>
</html>