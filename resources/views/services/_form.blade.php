<div class="m-portlet__body">
    <div class="m-form__section m-form__section--first">

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label class="">{{__('messages.customer')}} *</label>

                <select class="form-control m-select2 m_select2_4" name="customer_id">
                    <option value="">{{__('messages.choose_customer')}}</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}" @if($customer->id == old('customer_id', $service->customer_id)) selected @endif>{{$customer->name}}</option>
                    @endforeach
                </select>
                <span class="m-form__help">{{__('messages.choose_customer')}}.</span>

                @if ($errors->has('customer_id'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('customer_id') }}</strong>
                            </span>
                @endif
            </div>
        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label class="">{{__('messages.provider')}} *</label>

                <select class="form-control m-select2 m_select2_4" name="provider_id">
                    <option value="">{{__('messages.choose_provider')}}</option>
                    @foreach($providers as $provider)
                        <option value="{{$provider->id}}"
                                @if($provider->id == old('provider_id', $service->provider_id)) selected @endif>{{$provider->name}}</option>
                    @endforeach
                </select>
                <span class="m-form__help">{{__('messages.choose_provider')}}.</span>
                @if ($errors->has('provider_id'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('provider_id') }}</strong>
                            </span>
                @endif
            </div>
            <div class="col-lg-6">
                <label class="">{{__('messages.service_type')}} *</label>

                <select class="form-control m-select2 m_select2_4" name="service_type_id">
                    <option value="">{{__('messages.choose_service_type')}}</option>
                    @foreach($service_types as $type)
                        <option value="{{$type->id}}"
                                @if($type->id == old('service_type_id', $service->service_type_id)) selected @endif>{{$type->name}}</option>
                    @endforeach
                </select>
                <span class="m-form__help">{{__('messages.choose_service_type')}}.</span>
                @if ($errors->has('service_type_id'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('service_type_id') }}</strong>
                            </span>
                @endif
            </div>


        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">

                <label class="">{{__('messages.url')}} *</label>

                <div class="m-input-icon m-input-icon--left">
                    <input type="text" class="form-control m-input required" name="url" value="{{old('url', $service->url)}}">
                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                    <span>
                                                        <i class="la la-globe"></i>
                                                    </span>
                                                </span>
                </div>
                <span class="m-form__help">{{__('messages.enter_url')}}</span>
                @if ($errors->has('url'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                @endif

            </div>
            <div class="col-lg-6">

                <label class="">{{__('messages.frequency_renewal')}} *</label>

                <select class="form-control m-select2 m_select2_4" name="frequency">
                    <option value="">{{__('messages.choose_frequency_renewal')}}</option>
                    @foreach(\App\Enums\FrequencyRenewals::toSelectArray() as $key=>$value)
                        <option value="{{$key}}" @if($key == old('frequency', !is_null($service->frequency) ? $service->frequency : -1)) selected @endif>{{\App\Enums\FrequencyRenewals::getDescription($key)}}</option>
                    @endforeach
                </select>
                <span class="m-form__help">{{__('messages.choose_frequency_renewal')}}.</span>
                @if ($errors->has('frequency'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('frequency') }}</strong>
                        </span>
                @endif

            </div>


        </div>

        @if($all_field)
            <div class="m-form__seperator m-form__seperator--dashed"></div>

            <div class="form-group m-form__group row">
                <div class="col-lg-6">

                    <label class="">{{__('messages.deadline')}} *</label>

                    <div class="m-input-icon m-input-icon--left">

                        <input type="text" class="form-control required" id="m_datepicker_1" name="deadline" readonly value="{{old('deadline', $renewal->deadlineFormatted)}}"/>
                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span>
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </span>
                    </div>
                    <span class="m-form__help">{{__('messages.enter_deadline')}}</span>
                    @if ($errors->has('deadline'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('deadline') }}</strong>
                                </span>
                    @endif

                </div>
                <div class="col-lg-6">

                    <label class="">{{__('messages.amount')}} *</label>

                    <div class="m-input-icon m-input-icon--left">
                        <input type='text' class="form-control required" name="amount"
                               value="{{old('amount', $renewal->amountFormatted)}}"/>
                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span>
                                                            <i class="la la-euro"></i>
                                                        </span>
                                                    </span>

                    </div>
                    <span class="m-form__help">{{__('messages.currency_format')}} <code>€ 1.234,56</code></span>
                    @if ($errors->has('amount'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                    @endif

                </div>


            </div>

            <div class="m-form__seperator m-form__seperator--dashed"></div>

            <div class="form-group m-form__group row">
                <div class="col-lg-12">

                    <label class="">Stato del servizio *</label>

                    <select class="form-control m-select2 m_select2_4" name="status">
                        <option value="">Si prega di scegliere uno stato</option>
                        @foreach(config('state-machine.renewal.states') as $value)
                            <option value="{{$value}}" @if($value == old('status', !is_null($service->status) ? $service->status : -1)) selected @endif>{{\App\Enums\RenewalSM::getDescription($value)}}</option>
                        @endforeach
                    </select>
                    <span class="m-form__help">Si prega di scegliere uno stato.</span>
                    @if ($errors->has('status'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif

                </div>


            </div>
        @endif




        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label class="">{{__('messages.note')}}</label>

                <textarea class="form-control m-input" name="note" rows="10">{{old('note', $service->note)}}</textarea>
                <span class="m-form__help">{{__('messages.enter_note')}}</span>
                @if ($errors->has('note'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                @endif
            </div>

        </div>
    </div>


</div>

<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
        <a href="{{route('services.show', $service)}}" class="btn btn-secondary">{{__('messages.cancel')}}</a>
    </div>
</div>
