<div class="row bs-wizard" style="border-bottom:0;">

    <div class="col-md-4 col-4 bs-wizard-step complete">
        <div class="text-center bs-wizard-stepnum">Stap 1</div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center">Winkelwagen</div>
    </div>

    <div class="col-md-4 col-4 bs-wizard-step {{ Request::is('bestellen/bezorgmoment') || Request::is('bestellen/bevestigen') ? 'complete' : 'disabled'}}">
        <!-- complete -->
        <div class="text-center bs-wizard-stepnum">Stap 2</div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center">Bezorgmoment kiezen</div>
    </div>

    <div class="col-md-4 col-3 bs-wizard-step {{ Request::is('bestellen/bevestigen') ? 'complete' : 'disabled'}}">
        <!-- complete -->
        <div class="text-center bs-wizard-stepnum">Stap 3</div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center">Bevestig bestelling</div>
    </div>


</div>