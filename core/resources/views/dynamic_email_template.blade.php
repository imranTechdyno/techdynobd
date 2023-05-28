<!DOCTYPE html>
<html>
<style>
    p{       
    font-size: 18px;
    text-transform: capitalize;
    line-height: 1.8;
    color: #000;
    padding: 5px;
    }

    h2{
        font-size: 24px;
        padding: 3px;
    }

    h4{
        style="font-size: 20px;
    padding: 5px;"
    }
   
</style>

<body>
    <div>
    </div>
    <div class="card">       
        @if(@$details['service'])
        <h2>Service Title- {{ @$details['service'] }} </h2>
        <h2>Price Range- {{ @$details['actual_budget'] }} BDT</h2>
        <h2>Client Budget- {{ @$details['budget'] }}  BDT</h2>     
        @if(@$details['revise_new_budget'])
        <h2>Revise New price- {{ @$details['revise_new_budget'] }}  BDT</h2>  
        @endif   
        @endif
        <p>{!! @$details['message'] !!}</p>
    </div>

    <h4>Thank You,</h4>
    @if(@$details['revise_new_budget']|| @$details['select'])
    <h4>{{ @$general->sitename }}</h4>
    @endif
</body>

</html>
