
<!-- Login Modal -->
<button style="display: none;" type="button" id="walletLoginbtn" class="btn btn-primary" data-toggle="modal" data-target="#walletLogin"></button>
<div class="modal fade" id="walletLogin" tabindex="-1" role="dialog" aria-labelledby="walletLoginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content roundy">
      <div class="modal-header bg-orange">
        <h5 class="modal-title">Connect Your wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-primary" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <div class="row">
          <div class="col-md-12">
          <div class=" text-center" id="spinnerLoader" style="display: none;">
          <img class="img-fluid " width="" src="/public/assets/img/loader.gif" alt="">
          <p><b>Initializing, please wait...</b></p>
          </div>
              <div class="row" id="loginBtns">
              <div class="col-md-6 text-center">
              <h4><img class="img-fluid mr-1" width="15" src="/public/assets/img/metamask.png" alt=""> <span>MetaMask</span></h4>
                <p>Connect to the MetaMask Chrome extension</p>
              <button type="button" id="metamask" onclick="enableWalletProvider(this.id)" class="btn-primary  btn btn-block mt-3">Connect</button>
              </div>
              <div class="col-md-6 text-center">
                <h4><img class="img-fluid mr-1" width="15" src="/public/assets/img/fortmatic.png" alt=""><span> Fortmatic</span></h4>
                <p>Connect your wallet using phone number</p>

                <button type="button" id="fortmatic" onclick="enableWalletProvider(this.id)" class="btn btn-primary  btn-block mt-3">Connect</button>
              </div>
              
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
