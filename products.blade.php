@extends('layouts.master')
@section('content')
{{-- {{ session()->flush() }} --}}
<div class="container">
{{Form::open(['url' => 'additional-services', 'class' => 'product-form', 'id' => 'product-form', 'method' => 'POST', 'novalidate' => 'novalidate'])}}
    <div class="desktop-view" id="desktop-view">
        <input type="hidden" name="lte_data" value="<?php echo $lte_data; ?>">
        <div class="">
            <div class="row">
                <div class="date-Square-info">
                    <div class="page-headdings">
                        <h3 class="product-title">Hardware Rentals by Fello</h3>
                    </div>
                    <div class="start-end-date">
                        <div class="col-md-6 col-sm-6 date-label <?php if(empty($start_date)) echo "start-date";  else {echo "";}?>">
                            <div class="form-group form-group-sm pull-right rental-strat01">
                                <label class="">Rental Start Date&nbsp;&nbsp;<img src="{{ URL::asset('img/question-mark'.env('FC_BRANDING').'.png') }}" class="question-sign" data-toggle="popover" data-html="true" data-trigger="hover" data-placement="top" data-content="<div><p>The date your hardware will be delivered by UPS.</p></div>" /></label>
                                <input type="text" autocomplete="off" name="start_date" value="<?php echo $start_date; ?>" id="start_date" placeholder="MM/DD/YYYY" class="form-control" readonly="readonly" required="required">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 date-label">
                            <div class="form-group form-group-sm pull-left rental-strat02">
                                <label class="">Rental End Date&nbsp;&nbsp;<img src="{{ URL::asset('img/question-mark'.env('FC_BRANDING').'.png') }}" class="question-sign" data-toggle="popover" data-html="true" data-trigger="hover" data-placement="top" data-content="<div><p>The date your hardware must be submitted for return to UPS.</p></div>" /></label>
                                <input type="text" autocomplete="off" name="end_date" value="<?php echo $end_date; ?>" id="end_date" placeholder="MM/DD/YYYY" class="form-control"  readonly="readonly"required="required">
                            </div>
                        </div>    
                    </div>
                    <input type="hidden" name="export_to_pdf" value="no" class="export_to_pdf">
                </div>
            </div>
        </div>  
         
        <!--hardware-section-->
       
        <div class="line-border"></div>
            <div class="products-section">
                <div class="">
                    <h3 class="product-title">iPads</h3>
                    <div class="row justify-content">
                        <div class="col-sm-12">
                            <div class="col-sm-4 product-box-outer"></div>
                            <?php foreach($ipads as $ipad)
                            { 
                                $selected = ""; 

                                $qty = 0;

                                if (array_key_exists($ipad->id , $ipad_selected)){
                                    $selected = "selected";
                                    $qty = $ipad_selected[$ipad->id];
                                }
                                
                                ?>
                                <div class="col-sm-4 product-box-outer">
                                    <div class="product-img"> 
                                        <img src="{{ URL::asset('img') }}/{{$ipad->image}}" class="img-responsive" alt="{{$ipad->image}}" /> 
                                    </div>
                                    <h4 class="product-name">{{$ipad->name}}</h4>
                                    <!-- <span>{!! $ipad->info_message !!}</span> -->
                                    <div class="hardware-quantity"> 
                                        {!! $ipad->info_message !!}
                                        <span class="title01">Quantity:</span>
                                        <div class="box">
                                            @if($qty < env('QUANTITY_DROPDOWN_LIMIT'))
                                            <div class="quantity select-outer">
                                                <select name="ipad[<?php echo $ipad->id; ?>][]" class="product_quantity product_quantity_page product_{{$ipad->id}}" data-id="{{$ipad->id}}"  disabled="disabled"><option value="0">0</option>@for($i = 2; $i < env('QUANTITY_DROPDOWN_LIMIT'); $i++)<option value="{{$i}}" @if($selected != "" && $qty == $i){{$selected}}@endif>{{$i}}</option>@endfor
                                                    <option value="{{env('QUANTITY_DROPDOWN_LIMIT')}}+">{{env('QUANTITY_DROPDOWN_LIMIT')}}+</option></select>
                                                <i></i>
                                            </div>
                                            @endif
                                            <div class="quantity input-outer @if($qty < env('QUANTITY_DROPDOWN_LIMIT')) hide @endif">
                                                <input type="text" value="{{$qty}}" name="ipad[<?php echo $ipad->id; ?>][]" class="product_quantity_page ipad product_input form-control" data-id="{{$ipad->id}}" id="product_{{$ipad->id}}" disabled="disabled">
                                            </div>
                                        </div>                  
                                    </div>
                                </div>
                                <?php 
                            }
                            ?>
                            <div class="col-sm-4 product-box-outer"></div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="line-border"></div>  
        <center>
            <div id="msg_support" class="product_select_error" style="display: none; margin-top: 15px; color: #df3320;">Please select iPads.</div>
        </center>
        <br>
        <br>
        <div class="additional-button">
            <button class="btn btn-info submit_button" type="submit">CHECK OUT</button>
            <br>
            <a class="export-pdf home">Download PDF Quote <img src="{{ URL::asset('img/pdf.png') }}" class="pdf-icon" ></a>
        </div>
    </div>   
{!! Form::close() !!} 

<!-- *********************************mobile view******************************** --> 

{{Form::open(['url' => 'additional-services', 'class' => 'product-form', 'method' => 'POST', 'novalidate' => 'novalidate'])}}
    <div class="mobile-view" id="mobile-view" style="display: none;">
        <input type="hidden" name="lte_data" value="<?php echo $lte_data; ?>">
        <div class="row">
            <div  class="date-Square-info">
                <div class="page-headdings">
                    <h3 class="product-title">Hardware Rentals by Fello</h3>
                </div>
                <div class="start-end-date">
                    <div class="col-md-3"></div>
                    <div class="form-group form-group-sm col-md-3 date-label <?php if(empty($start_date)) echo "start-date";  else {echo "";}?>">
                        <label class="control-label">Rental Start Date&nbsp;&nbsp;<img src="{{ URL::asset('img/question-mark'.env('FC_BRANDING').'.png') }}" class="question-sign" data-toggle="popover" data-html="true" data-trigger="hover" data-placement="top" data-content="<div><p>The date your hardware will be delivered by UPS.</p></div>" /></label>
                        <input type="text" readonly="readonly" name="start_date" value="<?php echo $start_date; ?>" id="start_date_mobile" placeholder="MM/DD/YYYY" class="form-control" required="required">
                    </div>
                    <div class="form-group form-group-sm col-md-3 date-label">
                        <label class="control-label">Rental End Date&nbsp;&nbsp;<img src="{{ URL::asset('img/question-mark'.env('FC_BRANDING').'.png') }}" class="question-sign" data-toggle="popover" data-html="true" data-trigger="hover" data-placement="top" data-content="<div><p>The date your hardware must be submitted for return to UPS.</p></div>" /></label>
                        <input type="text" readonly="readonly" name="end_date" value="<?php echo $end_date; ?>" id="end_date_mobile" placeholder="MM/DD/YYYY" class="form-control" required="required">
                    </div>
                   <div class="col-md-3"> </div>
                </div>
                <input type="hidden" name="export_to_pdf" value="no" class="export_to_pdf" value="no">
            </div>
        </div>
        <div class="line-border"></div> 
        <div class="row">           
            <div class="col">
                <div class="panel-group">
                    <div class="products-section">              
                        <div class="container">                                    
                            <div class="row">
                                <h3 class="product-title">iPads</h3>
                                <div class="col-sm-2 product-box-outer"></div>
                                <?php foreach($ipads as $ipad){ ?>
                                <?php 
                                    $selected = ""; 
                                    $qty = 0;

                                    if (array_key_exists($ipad->id , $ipad_selected)){
                                        $selected = "selected";
                                        $qty = $ipad_selected[$ipad->id];
                                    }     
                                    ?>
                                    <div class="col-sm-4 product-box-outer">
                                        <div class="product-img"> <img src="{{ URL::asset('img') }}/{{$ipad->image}}" class="img-responsive" alt="{{$ipad->image}}" /> </div>
                                        <h4 class="product-name">{{$ipad->name}}</h4>
                                        <div class="hardware-quantity"> 
                                            {!! $ipad->info_message !!}
                                            <span class="title01">Quantity:</span>
                                            <div class="box">
                                                @if($qty < env('QUANTITY_DROPDOWN_LIMIT'))
                                                <div class="quantity select-outer">
                                                    <select name="ipad[<?php echo $ipad->id; ?>][]" class="product_quantity product_quantity_page product_{{$ipad->id}}" data-id="{{$ipad->id}}"  disabled="disabled"><option value="0">0</option>@for($i = 2; $i < env('QUANTITY_DROPDOWN_LIMIT'); $i++)<option value="{{$i}}" @if($selected != "" && $qty == $i){{$selected}}@endif>{{$i}}</option>@endfor
                                                        <option value="{{env('QUANTITY_DROPDOWN_LIMIT')}}+">{{env('QUANTITY_DROPDOWN_LIMIT')}}+</option></select>
                                                    <i></i>
                                                </div>
                                                @endif
                                                <div class="quantity input-outer @if($qty < env('QUANTITY_DROPDOWN_LIMIT')) hide @endif">
                                                    <input type="text" value="{{$qty}}" name="ipad[<?php echo $ipad->id; ?>][]" class="product_quantity_page ipad product_input form-control" data-id="{{$ipad->id}}" id="product_{{$ipad->id}}" data-insurance="{{$ipad->insurance}}" data-data="{{$ipad->data}}" disabled="disabled">
                                                </div>    
                                            </div>
                                        </div> 
                                    </div>
                                <?php 
                                }
                            ?>
                            <div class="col-sm-2 product-box-outer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="line-border"></div>
                </div>
            </div>               
        </div>
        <center>
            <div id="msg_support_mobile" class="product_select_error" style="display: none; margin-top: 15px; color:red;">Please select iPads.</div>
        </center>
        <div class="additional-button">
            <button class="btn btn-info submit_button" type="submit">CHECK OUT</button>
            <br>
            <a class="export-pdf home">Download PDF Quote <img src="{{ URL::asset('img/pdf.png') }}" class="pdf-icon" ></a>
        </div>
    </div>
<!-- </div>   
</div> -->
{!! Form::close() !!}
</div>
<div class="modal fade modal-ipad-configuration" id="ipadConfiguration" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <h5 class="modal-title">Media Installation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
@include('modal.theft_service_agreement')
<div class="modal fade modal-hardware-insurance" id="hardwareInsurance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <h5 class="modal-title">Hardware Insurance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@endsection

@section('external_scripts') 
<script type="text/javascript" src="{{ URL::asset('js/jquery.inputmask.bundle.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/moment-timezone.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/moment-timezone-with-data.min.js') }}"></script>
<!--<script type="text/javascript" src="{{ URL::asset('js/daterangepicker.js') }}"></script> -->
<style type="text/css">
  .ui-datepicker td {
    border: 0;
    padding: 5px;
}
.ui-datepicker-calendar .ui-state-disabled, .ui-datepicker-calendar .ui-widget-content .ui-state-disabled, .ui-datepicker-calendar .ui-widget-header .ui-state-disabled {
    opacity: 1;
    filter: Alpha(Opacity=100);
    background-image: none;
}
.ui-datepicker-calendar .ui-state-disabled span, .ui-datepicker-calendar .ui-widget-content .ui-state-disabled span, .ui-datepicker-calendar .ui-widget-header .ui-state-disabled span {
    opacity: .35;
    filter: Alpha(Opacity=35);
    background-image: none;
}
.ui-datepicker-calendar td.ui-state-disabled {
    pointer-events: all !important; 
    cursor: not-allowed !important;
}
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    background-color: #ffffff!important;
    border-color: #4b95c7!important;
    border-radius: 50% !important;
    background: #fff !important;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
    
    background: #fff !important;
    font-weight: normal;
    color: #454545 !important;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover  {
    border: 0px solid #c5c5c5 !important;
    background: #f6f6f6;
    font-weight: normal;
    color: #454545;
}
a.ui-state-default.ui-state-highlight.ui-state-active {
    border: 1px solid #4b95c7!important;
    height: 25px;
    width: 25px;
    vertical-align: middle;
    line-height: 20px;
    text-align: center;
    color: #4b95c7!important;
}
/*#ui-datepicker-div{
  left: 680px !important;
}*/
</style>
<script>
    $('.product-form').bootstrapValidator({
        container: 'tooltip'
    });
</script>
<script>
    var holidaysArray = <?php echo $holidays; ?>;

    $('body').popover({
       selector: '[data-toggle="popover"]',
       trigger: 'hover',
       animation:false
    }).on('hide.bs.popover', function () {
        if ($(".popover:hover").length) {
          return false;
        }                
    });
    
    $('body').on('mouseleave', '.popover', function(){
        $('.popover').popover('hide');
    });

    $('.export-pdf').on('click',function(){
        var corrent_form = $(this).closest('form')
        var accessories = corrent_form.find('.product_quantity_page:visible');
        var ipads = false;
        var ipad_quantity = true;
        $(accessories).each(function(index, element) {
            if(($.inArray($(element).attr('data-id'),["1","2"]) !== -1))
            {
                if($(element).val() >= 2){
                    ipads = true;
                }
                if($(element).val() > 0 && $(element).val() < 2){
                    ipad_quantity = false;
                }
            }
        });
        if(!ipads)
        {
            $(corrent_form).find('.product_select_error').text('Please select iPads.').show();
            return false;
        }
        if(!ipad_quantity)
        {
            $(corrent_form).find('.product_select_error').text('iPads minimum quantity should be 2.').show();
            return false;
        }
        $('.export_to_pdf').val('yes');
        corrent_form[0].submit();
    })

    $('.submit_button').on('click',function(){
        $('.export_to_pdf').val('no');
        var corrent_form = $(this).closest('form')
        var accessories = corrent_form.find('.product_quantity_page:visible');
        var ipads = false;
        var ipad_quantity = true;
        $(accessories).each(function(index, element) {
            if(($.inArray($(element).attr('data-id'),["1","2"]) !== -1))
            {
                if($(element).val() >= 2){
                    ipads = true;
                }
                if($(element).val() > 0 && $(element).val() < 2){
                    ipad_quantity = false;
                }
            }
        });
        if(!ipads)
        {
            $(corrent_form).find('.product_select_error').text('Please select iPads.').show();
            return false;
        }
        if(!ipad_quantity)
        {
            $(corrent_form).find('.product_select_error').text('iPads minimum quantity should be 2.').show();
            return false;
        }
    })
    
    $('body').on('mouseleave', '.popover', function(){
        $('.popover').popover('hide');
    });

    function isInArray(array, value) {
        if(jQuery.inArray(value, array) !== -1)
        {
            return true;
        }
        else
        {
            return false;
        }
        //return (array.find(item => {return item == value}) || []).length > 0;
    }

    function checkException(date){
        if(date.isoWeekday() === 6 || date.isoWeekday() === 7 || isInArray(holidaysArray,date.format("MM/DD/YYYY")))
        {
            date = date.add(1, 'days');
            checkException(date);
        }
        return date;
    }

    function addWeekdays(date, days) {
        var i = 0;
        if(date.isoWeekday() == 5 && !isInArray(holidaysArray,date.format("MM/DD/YYYY")))
        {
            date = moment(date).add((days+2), 'days');
        }
        else
        {
            while (i < days) {
                if(date.isoWeekday() !== 6 && date.isoWeekday() !== 7  && !isInArray(holidaysArray,date.format("MM/DD/YYYY")))
                {
                    date = moment(date).add(1, 'days');
                    i++;
                }
                else
                {
                    date = moment(date).add(1, 'days');
                }
            }
        }

        date = checkException(date);
        
        return date;
    }

    function getMinDate(){

        var currentEst = moment.tz("{{env('TIMEZONE')}}");

       // var currentEst = moment("2021-06-24 10:00:00");

        console.log(currentEst.hour());

        var current_est_time    = currentEst.format("HH");

        var minDate    = "";

        console.log(current_est_time);

        if((currentEst.month()==10 || currentEst.month()==11 || currentEst.month()==0) && (currentEst.isoWeekday() == 5)){

            if(current_est_time <= 12 || isInArray(holidaysArray,currentEst.format("MM/DD/YYYY")))
            {
                minDate = addWeekdays(currentEst,1);
            }
            else
            {
                minDate = addWeekdays(currentEst,2);
            }
        
        } else {

            if(current_est_time <= 14 || isInArray(holidaysArray,currentEst.format("MM/DD/YYYY")) || isInArray([6,7],currentEst.isoWeekday()))
            {
                minDate = addWeekdays(currentEst,1);
            } else {
                minDate = addWeekdays(currentEst,2);
            }
        }

        minDate    = moment(minDate).format("MM/DD/YYYY");

        console.log(minDate);

        return minDate;
    }

    var minStartDate = getMinDate();

    /*if('{{ $start_date }}'){
        var maxEndDate   = moment('{{ $start_date }}').add(90, 'days').toDate();
    } else {
        var maxEndDate   = '+1Y+6M';
    }*/

    if('{{ $start_date }}'){
        var select_start_date = '{{ $start_date }}';
        var select_end_date = '{{ $end_date }}';

        if(moment(minStartDate).isAfter(select_start_date)){
            select_start_date = minStartDate;
        }

        var minEnddate   = getNextDay(select_start_date);

        if(moment(minEnddate).isAfter(select_end_date)){
            select_end_date = minEnddate;
        }

        $("input[name=start_date]").val(select_start_date);
        $("input[name=end_date]").val(select_end_date);
        var maxEndDate   = moment('{{ $start_date }}').add(90, 'days').toDate();
    } else {
        var minEnddate   = getNextDay(minStartDate);
        var maxEndDate   = '+1Y+6M';
    }

    var minEndDate   = getNextDay(minStartDate);

    function checkValidDate(date){
        var toolTip = "";
        if(moment(date).add(1, 'days') >= moment())
        {
            toolTip = "addTooltip";
        }
        if(isInArray(holidaysArray,moment(date).format("MM/DD/YYYY")))
        {
            return [false,toolTip];
        }

        return date.getDay() == 0 || date.getDay() == 6 ? [false,toolTip] : [true,toolTip];
    }

    function checkValidAcceptDate(date){
        if(isInArray(holidaysArray,moment(date).format("MM/DD/YYYY")))
        {
            return false;
        }
        return date.getDay() == 0 || date.getDay() == 6 ? false : true;
    }

    function getNextDay(date){
        var new_date = moment(date).add(1, 'days').toDate();

        if(checkValidAcceptDate(new_date))
        {
            return moment(new_date).format("MM/DD/YYYY");
        }
        else
        {
            return getNextDay(new_date);
        }
    }

    function getValidMaxEndDay(date){
        if(checkValidAcceptDate(date))
        {
            return moment(date).format("MM/DD/YYYY");
        }
        else
        {
            var new_date = moment(date).subtract(1, 'days').toDate();
            return getValidMaxEndDay(new_date);
        }
    }

    function getPrevDay(date){
        var new_date = moment(date).subtract(1, 'days').toDate();

        if(checkValidAcceptDate(new_date))
        {
            return moment(new_date).format("MM/DD/YYYY");
        }
        else
        {
            return getPrevDay(new_date);
        }
    }

    function getExtendedDays(days, date){

        var daysCount = 0,
            days = days+13,
            count = 0;

        while (count <= days) {

            if(checkValidAcceptDate(moment(date).add(count, 'days').toDate())){
                daysCount++;
            }
            count++;
        }
        var new_date = moment(date).add(daysCount, 'days').toDate();

        return moment(new_date).format("MM/DD/YYYY");
    }

    // Artificial tooltip
    function ArtTooltip(){
        setTimeout(function() { 
            $("td.addTooltip span.ui-state-default").attr('data-toggle','tooltip');
            $("td.addTooltip span.ui-state-default").attr('title','Please select the preceding or next business day, as applicable.');
            $("td.addTooltip span.ui-state-default").tooltip();
        }, 10);
    }

    function ArtEndTooltip(date){
        setTimeout(function() { 
            $("td.addTooltip:not(.ui-datepicker-week-end) span.ui-state-default").attr('data-toggle','tooltip');
            $("td.addTooltip:not(.ui-datepicker-week-end) span.ui-state-default").attr('title','Rental period cannot exceed 14 calendar days.');
            $("td.addTooltip:not(.ui-datepicker-week-end) span.ui-state-default").tooltip();

            $("td.addTooltip.ui-datepicker-week-end span.ui-state-default").attr('data-toggle','tooltip');
            $("td.addTooltip.ui-datepicker-week-end span.ui-state-default").attr('title','Please select the preceding or next business day, as applicable.');
            $("td.addTooltip.ui-datepicker-week-end span.ui-state-default").tooltip();

        }, 10);
    }

    $("#start_date").datepicker({
        minDate: minStartDate,
        maxDate: '+1Y+6M',
        beforeShowDay: function(date){ return checkValidDate(date) },
        onSelect: function(dateStr) {
            $('.export_to_pdf').val('no');
            var min = $(this).datepicker('getDate');// Get selected date
            $('.product-form').bootstrapValidator('revalidateField', 'start_date');
            var endDate = ($("#end_date").datepicker('getDate')); 
            if(endDate==null){
                endDate = getNextDay($("#start_date").datepicker('getDate'));
            }       
            updateDatePickers(min,endDate);
            //var maxDate = getExtendedDays(4, $("#start_date").datepicker('getDate'));
           //var maxDate = moment($("#start_date").datepicker('getDate')).add(14, 'days').toDate();

            //$("#end_date").val(endDate);
            //$("#end_date").datepicker('option', 'maxDate', maxDate);
           // $("#end_date").datepicker('option', 'minDate', endDate); // Set other min, default to today
            //$('.product-form').bootstrapValidator('revalidateField', 'end_date');
        },
        beforeShow: function(input, inst) {
             ArtTooltip();   
        },
        onChangeMonthYear: function(year, month, inst) {
            ArtTooltip();
        }
    });

    $("#end_date").datepicker({
        minDate: minEndDate,
        maxDate: maxEndDate,
        beforeShowDay: function(date){ 
            ArtEndTooltip(date);
            return checkValidDate(date) 
        },
        onSelect: function(dateStr) {
            $('.export_to_pdf').val('no');
            var max = $(this).datepicker('getDate');
            updateDatePickers($("#start_date").datepicker('getDate'),max);
            //var minStartDate = getPrevDay($("#end_date").datepicker('getDate')); 
           // $("#start_date").datepicker('option', 'maxDate', minStartDate);
            //$('.product-form').bootstrapValidator('revalidateField', 'end_date');
            //$('.product-form').bootstrapValidator('revalidateField', 'start_date');
            //$('#start_date').datepicker('option', 'maxDate', max || '+1Y+6M');
        },
        beforeShow: function(input, inst) {
            //ArtEndTooltip();   
        },
        onChangeMonthYear: function(year, month, inst) {
            //ArtEndTooltip();
        }
    });

    $("#start_date_mobile").datepicker({
        minDate: minStartDate,
        maxDate: '+1Y+6M',
        beforeShowDay: function(date){ return checkValidDate(date) },
        onSelect: function(dateStr) {
            $('.export_to_pdf').val('no');
            var min = $(this).datepicker('getDate'); // Get selected date
            $('.product-form').bootstrapValidator('revalidateField', 'start_date');
            var endDate = ($("#end_date_mobile").datepicker('getDate'));
            if(endDate==null){
                endDate = getNextDay($("#start_date_mobile").datepicker('getDate'));
            }  
            updateDatePickers(min,endDate);
            //var maxDate = moment($("#start_date_mobile").datepicker('getDate')).add(14, 'days').toDate();
          //  $("#end_date_mobile").val(endDate);
           // $("#end_date_mobile").datepicker('option', 'maxDate', maxDate);
          //  $("#end_date_mobile").datepicker('option', 'minDate', endDate); // Set other min, default to today
          //  $('.product-form').bootstrapValidator('revalidateField', 'end_date');
        },
        beforeShow: function(input, inst) {
             ArtTooltip();   
        },
        onChangeMonthYear: function(year, month, inst) {
            ArtTooltip();
        }
    });
    $("#end_date_mobile").datepicker({
        minDate: minEndDate,
        maxDate: maxEndDate,
        beforeShowDay: function(date){ return checkValidDate(date) },
        onSelect: function(dateStr) {
            $('.export_to_pdf').val('no');
            var max = $(this).datepicker('getDate');
            updateDatePickers($("#start_date_mobile").datepicker('getDate'),max);
            //$("#start_date_mobile").datepicker('option', 'maxDate', minStartDate);
           // $('.product-form').bootstrapValidator('revalidateField', 'end_date');
           // $('.product-form').bootstrapValidator('revalidateField', 'start_date');
            //$('#start_date_mobile').datepicker('option', 'maxDate', max || '+1Y+6M');
        },
        beforeShow: function(input, inst) {
             ArtEndTooltip();   
        },
        onChangeMonthYear: function(year, month, inst) {
            ArtEndTooltip();
        }
    });
    $("#start_date_mobile").on('click',function(){
        $(this).focus()
    });
    $("#end_date_mobile").on('click',function(){
        $(this).focus()
    });

    $(window).on("load", function(){
        $('.product_quantity_page').prop('disabled', false);
    })

    $("input.product_quantity_page").inputmask({
        "mask": "999",
        "placeholder": ""
    });
    $(document).on('keyup','.accessory input.product_quantity_page',function(){
        if($(this).val() == 1 || $(this).val() == 2){
            $(this).val(0);
            $(this).parents('.hardware-quantity').find('.input-validate-error').text('Please enter minimum value 3');
        }else{
            $(this).parents('.hardware-quantity').find('.input-validate-error').text('');
        }
    })
    var select_option_old_value = 0;
    $(document).on('click','select.product_quantity_page',function(){
        select_option_old_value = this.value;
    }).on('change','select.product_quantity_page',function(e) {
        var selected_quantity = $(e.target).val();
        if(selected_quantity == "{{env('QUANTITY_DROPDOWN_LIMIT')}}+"){
            var slectedParent = $(e.target).parent().parent().children('.input-outer');
            slectedParent.removeClass('hide');
            slectedParent.find('input.product_quantity_page').focus().val(select_option_old_value).select();
            $(e.target).parent().remove();
        }
    });

    function updateDatePickers(startDate,endDate){
        if(startDate!=""){
            var maxEnddate = moment(startDate).add(90, 'days').toDate();
            var maxEnddate = getValidMaxEndDay(maxEnddate);
            $("input[name*='start_date']").val(moment(startDate).format("MM/DD/YYYY"));
            $("input[name*='end_date']").datepicker('option', 'maxDate', maxEnddate);
        }
       
        $("input[name*='end_date']").val(moment(endDate).format("MM/DD/YYYY"));
        var minEnddate = getNextDay(startDate);
        $("input[name*='end_date']").datepicker('option', 'minDate', minEnddate); // Set other min, default to today
        $('.product-form').bootstrapValidator('revalidateField', 'start_date');
        $('.product-form').bootstrapValidator('revalidateField', 'end_date');
    }
</script> 
@endsection
