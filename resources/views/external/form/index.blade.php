<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
<style>
    .form-questionaire .change {
        border: none;
        border-bottom: 1px solid;
        border-radius: 0;
        border-color: #cdd1d3;
    }

    .form-questionaire .change:focus {
        outline: none;
        box-shadow: none;
        border-bottom: 2px solid;
        border-color: #989cf8;
    }
</style>

<?php

use App\Http\Controllers\FormController; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mx-0 mx-sm-auto">
                <div class="card" style="margin:30 300px;">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white mt-2" id="exampleModalLabel">Community Care Program interest</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text">
                            <p style="padding:20px">
                                Our Community Care team is here to offer resource support and help you develop health <br> goals and a plan for you and your family.
                                Please help us by answering a few questions.<br> Our community health worker team will reach out to you soon!<br>
                                Thank you for connecting with us.<br><br>

                                Nuestro equipo de Community Care está aquí para ofrecer recursos de apoyo y ayudarlo <br> a desarrollar metas de salud y un plan para usted y su familia.
                                Por favor ayúdenos <br> respondiendo algunas preguntas básicas. ¡Nuestro equipo de trabajadores de la <br> salud de la comunidad se comunicará con usted pronto!<br>
                                Gracias por conectar con nosotros.
                            </p>
                        </div>

                        <hr />

                        <form class="px-4 form-questionaire" action="{{ route('form/store') }}" method="post">
                            @csrf
                            <input name="form_id" type="hidden" value="{{$form->id}}" id="typeText" class="form-control change" required />
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">First Name / Primer nombre*</label>
                                <div class="col-sm-10">
                                    <input name="first_name" type="text" value="" id="typeText" class="form-control change" required />
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Last Name / Apellido*</label>
                                <div class="col-sm-10">
                                    <input name="last_name" type="text" value="" id="typeText" class="form-control change" required />
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Email / Correo electrónico*</label>
                                <div class="col-sm-10">
                                    <input name="email" type="text" value="" id="typeText" class="form-control change" required />
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Phone Number / Número de teléfono*</label>
                                <div class="col-sm-10">
                                    <input name="phone" type="text" value="" id="typeText" class="form-control change" required />
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Zip Code / Código postal*</label>
                                <div class="col-sm-10">
                                    <input name="zip_code" type="text" value="" id="typeText" class="form-control change" required />
                                    <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                </div>
                            </div>
                            <hr />
                            <p class="text">Which of the following best describes you? / ¿Cuál de las siguientes te describe mejor?</p>
                            <fieldset id="best_describe">
                                <div class="form-check mb-2">
                                    <input class="form-check-input best_describe" type="radio" value="Asian or Pacific Islander / Asiático o Isleño del Pacífico" name="best_describe" />
                                    <span class="text-danger">{{ $errors->first('best_describe') }}</span>
                                    <label class="form-check-label" for="best_describe">
                                        Asian or Pacific Islander / Asiático o Isleño del Pacífico
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input best_describe" type="radio" value="Black or African American / Negro o Afroamericano" name="best_describe" />
                                    <span class="text-danger">{{ $errors->first('best_describe') }}</span>
                                    <label class="form-check-label" for="best_describe">
                                        Black or African American / Negro o Afroamericano
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input best_describe" type="radio" value="Hispanic or Latino / Hispano o Latino" name="best_describe" />
                                    <span class="text-danger">{{ $errors->first('best_describe') }}</span>
                                    <label class="form-check-label" for="best_describe">
                                        Hispanic or Latino / Hispano o Latino
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input best_describe" type="radio" value="White or Caucasian / Blanco o Caucásico" name="best_describe" />
                                    <span class="text-danger">{{ $errors->first('best_describe') }}</span>
                                    <label class="form-check-label" for="best_describe">
                                        White or Caucasian / Blanco o Caucásico
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input best_describe" type="radio" value="other" name="best_describe" />
                                    <span class="text-danger">{{ $errors->first('best_describe') }}</span>
                                    <label class="form-check-label" for="best_describe">
                                        Other
                                    </label>
                                    <div id="other_describe">

                                    </div>
                                    <!-- <input name="best_describe" value="" type="text" for="best_describe" value="" class="change" style="width:90%" /> -->
                                </div>
                            </fieldset>
                            <hr />
                            <p class="text">What is your preferred language? / ¿Cuál es tu idioma preferido?*</p>
                            <fieldset id="group2">
                                <div class="form-check mb-2">
                                    <input class="form-check-input language" type="radio" value="English / Inglés" name="language" />
                                    <span class="text-danger">{{ $errors->first('language') }}</span>
                                    <label class="form-check-label" for="language">
                                        English / Inglés
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input language" type="radio" name="language" value="Spanish / Español" />
                                    <span class="text-danger">{{ $errors->first('language') }}</span>
                                    <label class="form-check-label" for="language">
                                        Spanish / Español
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input language" type="radio" value="other" name="language" />
                                    <span class="text-danger">{{ $errors->first('language') }}</span>
                                    <label class="form-check-label" for="language">
                                        Other
                                    </label>
                                    <div id="other_language">

                                    </div>
                                    <!-- <input name="language" value="" type="text" for="language" value="" class="change" style="width:90%" /> -->
                                </div>
                            </fieldset>
                            <hr />
                            @foreach($question_list as $key => $list)
                            <label>{{$list->question_data->question}}</label>
                            <?php $answer =  FormController::get_answer($list->form_id, $list->question_id);
                            ?>
                            @foreach($answer as $ans_list)
                            <fieldset id="group3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" value="{{$ans_list->answer_data->id}}" name="responses[{{ $list->question_data->id }}]" id="{{$ans_list->answer_data->id}}" />
                                    <label class="form-check-label" for="group3">
                                        {{$ans_list->answer_data->answer}}
                                    </label>
                                </div>
                            </fieldset>
                            @endforeach
                            <hr />
                            @endforeach

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">How can we help you? / Como podemos ayudarte?</label>
                                <div class="col-sm-12">
                                    <input name="help" type="text" value="" id="help" class="form-control change" required />
                                    <span class="text-danger">{{ $errors->first('help') }}</span>
                                </div>
                            </div>
                            <hr />
                            <p class="text">I agree to allow Bread of Life to help me with support for my family. This is free and I can discontinue support at any time. All information will be stored securely and will not be shared without my consent. /<br>
                                Estoy de acuerdo en permitir que Bread of Life me ayude con el sustento de mi familia. Esto es gratis y puedo suspender el soporte en cualquier momento. Toda la información se almacenará de forma segura y no se compartirá sin mi consentimiento.</p>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example10" required />
                                <label class="form-check-label" for="radio3Example10">
                                    I understand /Entiendo
                                </label>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<!-- MDB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
<script>
    $(document).ready(function() {
        $(".best_describe").click(function() {
            if ($(this).val() == 'other') {
                $('#other_describe').html('<input name="best_describe" value="" type="text" for="best_describe" value="" class="change" style="width:90%" />');
            } else {
                $('#other_describe').html('');
            }
        });

        $(".language").click(function() {
            if ($(this).val() == 'other') {
                $('#other_language').html('<input name="language" value="" type="text" for="language" value="" class="change" style="width:90%" /> ');
            } else {
                $('#other_language').html('');
            }
        });
    });
</script>