<div class="m-portlet__body">
    <div class="m-form__section m-form__section--first">
        <div class="form-group m-form__group">
            <label class="">{{__('messages.url')}} *</label>

            <div class="m-input-icon m-input-icon--left">
                <input type="text" class="form-control m-input required" name="url" value="{{old('url', $domain->url)}}">
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

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group">
            <label class="">{{__('messages.customer')}} *</label>

            <select class="form-control m-select2 m_select2_4" name="customer_id">
                <option value="">{{__('messages.choose_customer')}}</option>
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}" @if($customer->id == old('customer_id', $domain->customer_id)) selected @endif>{{$customer->name}}</option>
                @endforeach
            </select>
            <span class="m-form__help">{{__('messages.choose_customer')}}.</span>
            @if ($errors->has('customer_id'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('customer_id') }}</strong>
                            </span>
            @endif


        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group">
            <label class="">{{__('messages.domain')}}</label>

            <select class="form-control m-select2 m_select2_4" name="domain_id">
                <option value="">{{__('messages.choose_provider')}}</option>
                @foreach($providers as $provider)
                    <option value="{{$provider->id}}"
                            @if($provider->id == old('domain_id', $domain->domain_id)) selected @endif>{{$provider->name}}</option>
                @endforeach
            </select>
            <span class="m-form__help">{{__('messages.choose_provider')}}.</span>
            @if ($errors->has('domain_id'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('domain_id') }}</strong>
                            </span>
            @endif

        </div>

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group">
            <label class="">{{__('messages.hosting')}}</label>

            <select class="form-control m-select2 m_select2_4" name="hosting_id">
                <option value="">{{__('messages.choose_provider')}}</option>
                @foreach($providers as $provider)
                    <option value="{{$provider->id}}"
                            @if($provider->id == old('hosting_id', $domain->hosting_id)) selected @endif>{{$provider->name}}</option>
                @endforeach
            </select>
            <span class="m-form__help">{{__('messages.choose_provider')}}.</span>
            @if ($errors->has('hosting_id'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('hosting_id') }}</strong>
                            </span>
            @endif


        </div>


        <div class="m-form__seperator m-form__seperator--dashed"></div>


        <div class="form-group m-form__group">
            <label class="">{{__('messages.deadline')}} *</label>

            <div class="m-input-icon m-input-icon--left">

                <input @if(!$deadline)disabled @endif type="text" class="form-control required" id="m_datepicker_1" name="deadline" readonly value="{{old('deadline', $domain->deadlineFormatted)}}"/>
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

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group">
            <label class="">{{__('messages.amount')}} *</label>

            <div class="m-input-icon m-input-icon--left">
                <input type='text' class="form-control required" name="amount"
                       value="{{old('amount', $domain->amountFormatted)}}"/>
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

        @if($expiring)
            <div class="m-form__seperator m-form__seperator--dashed"></div>

            <div class="m-form__group form-group">
                <label class="">{{__('messages.payed')}}</label>

                <div>

                                        <span class="m-switch m-switch--lg m-switch--icon m-switch--success">
                                            <label>
                                                <input type="hidden" checked="checked" value="0" name="payed">
                                                <input class="required" type="checkbox"
                                                       @if(old('payed', $domain->payed) == 1)checked="checked"
                                                       @endif value="1"
                                                       name="payed">
                                                <span></span>
                                            </label>
                                        </span>
                </div>
                <span class="m-form__help">{{__('messages.status_payment')}}</span>
                @if ($errors->has('payed'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('payed') }}</strong>
                                    </span>
                @endif


            </div>
        @endif

        <div class="m-form__seperator m-form__seperator--dashed"></div>

        <div class="form-group m-form__group">
            <label class="">{{__('messages.note')}}</label>

            <textarea class="form-control m-input" name="note" rows="10">{{old('note', $domain->note)}}</textarea>
            <span class="m-form__help">{{__('messages.enter_note')}}</span>
            @if ($errors->has('note'))
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('note') }}</strong>
                                </span>
            @endif


        </div>
    </div>


</div>

<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
        <a href="{{route('domains.index')}}" class="btn btn-secondary">{{__('messages.cancel')}}</a>
    </div>
</div>