{{ Form::open(array('action' => array('Fbf\LaravelJobs\JobsController@apply', $job->slug), 'class' => 'job-application-form', 'files' => true)) }}

        {{ Form::hidden('from', Request::path()) }}

        @if (Session::has('thanks_message'))
                <div class="alert alert-success">
                        {{ Session::get('thanks_message') }}
                </div>
        @endif

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                {{ Form::label('name', trans('laravel-jobs::copy.application.name'), array('class' => 'control-label jobs-name-label')) }}

                {{ Form::text('name', Input::old('name'), array('class' => 'form-control jobs-name', 'placeholder' => trans('laravel-jobs::copy.application.name'))) }}

                @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                @endif

        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                {{ Form::label('email', trans('laravel-jobs::copy.application.email'), array('class' => 'control-label jobs-email-label')) }}

                {{ Form::text('email', Input::old('email'), array('class' => 'form-control jobs-email', 'placeholder' => trans('laravel-jobs::copy.application.email'))) }}

                @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                @endif

        </div>

        <div class="form-group{{ $errors->has('letter') ? ' has-error' : '' }}">

                {{ Form::label('letter', trans('laravel-jobs::copy.application.covering_letter'), array('class' => 'control-label jobs-covering-letter-label')) }}

                {{ Form::textarea('letter', Input::old('letter'), array('class' => 'form-control jobs-covering-letter', 'placeholder' => trans('laravel-jobs::copy.application.covering_letter'))) }}

                @if ($errors->has('letter'))
                        <span class="help-block">{{ $errors->first('letter') }}</span>
                @endif

        </div>

        <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">

                {{ Form::label('cv', trans('laravel-jobs::copy.application.cv'), array('class' => 'control-label jobs-cv-label')) }}

                {{ Form::file('cv', null, array('class' => 'form-control jobs-cv', 'placeholder' => trans('laravel-jobs::copy.application.cv'))) }}

                @if ($errors->has('cv'))
                        <span class="help-block">{{ $errors->first('cv') }}</span>
                @endif

        </div>

        {{ Form::submit(trans('laravel-jobs::copy.application.submit'), array('class' => 'btn btn-default jobs-submit')) }}

{{ Form::close() }}