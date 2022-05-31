@extends('layouts.app')
@section('content')


{{--SIGNATURE--}}



<div class="container">

	<div class="row">

		<div class="col-md-10 offset-md-1 mt-2">

			<div class="card">

				<div class="card-header">

					<h2>Imposta la tua firma</h2>
					<h6>Sarà riportata nei tuoi buoni di pilotaggio </h6>

				</div>

				<div class="card-body">

					@if ($message = Session::get('success'))

						<div class="alert alert-success  alert-dismissible">

							<button type="button" class="close" data-dismiss="alert">×</button>

							<strong>{{ $message }}</strong>

						</div>

					@endif

					<div class="wrapper">
						<div id="signature-pad" class="m-signature-pad"  >
							<div class="m-signature-pad--body">
								<canvas style="border: 2px dashed #ccc; height: 100px"></canvas>
							</div>

							<div class="m-signature-pad--footer">
								<button type="button" class="btn  btn-secondary" data-action="clear">Pulisci</button>
								<button type="button" class="btn  btn-primary" data-action="save">Salva</button>
							</div>
						</div>
					</div>



				</div>

				<div class="row">
					<div class="col-lg-6 col-sm-10 offset-lg-3 offset-sm-1">
						@if(auth()->user()->checkFirma())
							<div class="alert alert-success" role="alert">
								La tua firma attuale
								<hr>
								<img src="{{ auth()->user()->imgFirma() }}" width="100%"/>
							</div>
						@else
							<div class="alert alert-danger" role="alert">
								<strong>Nessuna firma impostata.</strong>
								Per poter inserire nuovi buoni di pilotaggio, è necessario generare una firma che automaticamente verrà inserita nei tuoi buoni di pilotaggio
							</div>
						@endif
					</div>
				</div>

			</div>

		</div>

	</div>

</div>




{{--FINE SIGNATURE--}}

@endsection

@section('scripts')
	@parent

	{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
	{{--<script src="{{ asset('js/signature/jquery.signature.js') }}"></script>--}}
	<script src="{{ asset('js/signature/v2/signature_pad.min.js') }}"></script>


	<script type="text/javascript">



        $(document).ready( function() {


            var wrapper = document.getElementById("signature-pad"),
                clearButton = wrapper.querySelector("[data-action=clear]"),
                saveButton = wrapper.querySelector("[data-action=save]"),
                canvas = wrapper.querySelector("canvas"),
                signaturePad;

            // Adjust canvas coordinate space taking into account pixel ratio,
            // to make it look crisp on mobile devices.
            // This also causes canvas to be cleared.
            /*window.resizeCanvas = function () {
                var ratio =  window.devicePixelRatio || 1;
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }

            resizeCanvas();*/
            signaturePad = new SignaturePad(canvas);

            function resizeCanvas() {


                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }

            function drawCanvas() {


                resizeCanvas();
                signaturePad = new SignaturePad(canvas);
                /*if ("{$fsc->firma}" !== "") {
                    signaturePad.fromDataURL("{$fsc->firma}");
                }*/
            }

            window.addEventListener("resize", drawCanvas);
            drawCanvas();



            clearButton.addEventListener("click", function(event) {
                signaturePad.clear();
            });

            saveButton.addEventListener("click", function(event) {
                event.preventDefault();

                if (signaturePad.isEmpty()) {
                    alert("Firma assente. Ti preghiamo di apporre la tua firma.");
                } else {
                    var dataUrl = signaturePad.toDataURL();
                    // var image_data = dataUrl.replace(/^data:image\/(png|jpg);base64,/, "");

                    $.ajax({
                        url: '{{ route('signature_upload') }}',
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            //signed: "data:image/png;base64,"+ image_data,
                            signed: dataUrl,
							action: 'set_firma_user'
                        },
                    }).done(function(res, textStatus, xhr) {
                        /*console.log(xhr.status);
                        console.log(textStatus);*/
                        alert(res.message);
                        window.location='<?=route('admin.users.show_form_firma')?>'
                    });
                }
            });


            $('#modalFirma').css('display','none');


        });






	</script>


@endsection

@section('styles')
	@parent
	{{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">--}}
	<style>


		canvas {
			width: 100% !important;
			object-fit: contain;
		}


		.wrapper {
			position: relative;
			width: 100%;
			height: 200px;
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		.signature-pad {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 200px;
			background-color: white;
		}


	</style>

	<link rel="stylesheet" type="text/css" href="{{ asset('/css/signature/jquery.signaturepad.css') }}">


@endsection
