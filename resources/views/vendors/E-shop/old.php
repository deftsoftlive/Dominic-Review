@extends('layouts.vendor')
@section('vendorContents')

                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="page_head-card">
                                            <div class="page-info">
                                                    <div class="page-header-title">
                                                        <h3 class="m-b-10">Create Shop</h3>
                                                    </div>
                                                    <ul class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="http://49.249.236.30:8654/vendors"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                                        <li class="breadcrumb-item">Create shop</li>
                                                    </ul>
                                                 </div>                                             
                                        </div>
                                  </div>

                                  <div class="col-lg-12">
                                      <div class="card vendor-dash-card">
                                       <div class="card-header"><h3>Create Shop Steps</h3></div>
                                       <div class="card-body">
                                        <!-- Create shop multistep -->

    <div id="wizard" class="wizard">
        <div class="wizard__content">
          <header class="wizard__header" style="background-image: url('/frontend/images/shopping-banner.jpg');">
            <div class="wizard__header-overlay"></div>
            
            <div class="wizard__header-content">
              <h1 class="wizard__title" > Lorem Ipsum has been the industry's standard dummy text</h1>
              <p class="wizard__subheading">Start with <span>4</span> simple steps.</p>
            </div>
          </header>
          <!-- create shop steps -->
          <div class="wizard__steps">
              <nav class="steps">
              <div class="step">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-building"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>

                  <div class="lines">
                    <div class="line -start">
                    </div>
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                  </div> 
                   <h4>Shop Name</h4> 
                </div>
              </div>

              <div class="step">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-tags"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>
                  <div class="lines">
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                  </div> 
                   <h4>Product Category</h4>
                </div>
              </div>

              <div class="step">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-user-tag"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>
                  <div class="lines">
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                    <h4>Sub Category</h4>
                  </div> 
                </div>
              </div>
              <div class="step">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-wallet"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>
                  <div class="lines">
                    <div class="line -background">
                    </div>
                    <div class="line -progress">
                    </div>
                     <h4>Billing</h4>
                  </div> 
                </div>
              </div>
            </nav>
            </div>
         <!--  fdf -->
          <div class="panels">
            <form method="post" id="shopCreate">
              @csrf
              <input type="hidden" id="ShopFormStep" value="1">
              <div class="panel" id="step-shop-1" data-step="1">
                 <div class="shop-form-card">
                  <header class="panel__header text-center">
                      <h2 class="panel__title">Name Your Shop</h2>
                      <p class="panel__subheading">Choose a memorable name that reflects your style.</p>
                  </header>
                  <div class="create-shop-form">
                      <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                              <div class="cstm-form-control-wrap">
                                <input type="text" name="shop_name" class="form-control shop-input" placeholder="Enter your shop name">
                                
                                <input type="hidden" 
                                       id="checkAvailabilty" 
                                       value="{{url(route('shop.ajax.checkAvailablityValiadation'))}}"
                                       >
                            </div>
                            </div>
                            <div class="form-group">
                            <p>Your shop name will appear in your shop and next to each of your listings throughout Etsy. After you open your shop, you can change your name once. </p>
                          </div>
                            <a href="javascript:void(0);" class="normal-link mt-3">Here are some tips for picking a shop name.</a>
                        </div> 
                        <div class="col-lg-4">
                            <!-- Upload  -->
                          <div class="uploader file-upload-form">
                            <input id="file-upload" type="file" name="logo" accept="image/*" />
                            <label for="file-upload" id="file-drag">
                              <img id="file-image" src="#" alt="Preview" class="hidden">
                              <div id="start">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                <div>Select a file or drag here</div>
                                <div id="notimage" class="hidden">Please select an image</div>
                                <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                              </div>
                              <div id="response" class="hidden">
                                <div id="messages"></div>
                                <progress class="progress" id="file-progress" value="0">
                                  <span>0</span>%
                                </progress>
                              </div>
                            </label>
                          </div>
                        </div> 
                      </div>                    
                  </div>
              </div>
            </div>

            <div class="panel" id="step-shop-2" data-step="2">
                <div class="shop-form-card">
                <header class="panel__header text-center">
                  <h2 class="panel__title">Product Category</h2>
                  <p class="panel__subheading">Choose a memorable name that reflects your style.</p>
                </header>
                <div class="create-shop-form">
                    <div class="row">
                      <div class="col-lg-3 col-md-6"> 
                         <ul class="shop-category-list">
                            <li>
                                  <div class="product-cate-checkbox custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="ProductCate-1" name="category[]">
                                      <label class="custom-control-label" for="ProductCate-1">Gifts</label>
                                   </div>
                            </li>
                         </ul>
                        </div>
                    </div>                    
                </div>
            </div>
            </div>

            <div class="panel" id="step-shop-3" data-step="3">
              <div class="shop-form-card">
              <header class="panel__header text-center">
                <h2 class="panel__title">Stay in touch with the community.</h2>
                <p class="panel__subheading">Community is everything, and here we do some crazy stuff.</p>
               </header>
                 <div class="create-shop-form">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="product-cate-list-head">
                          <h3>Gifts</h3>
                        </div> 
                         <ul class="shop-category-list">
                          <li>
                            <div class="product-cate-checkbox custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Product-subCate-1">
                                    <label class="custom-control-label" for="Product-subCate-1">Item 1</label>
                                 </div>
                          </li>
                         </ul>
                       </div>
                    </div>                    
                </div>
            </div>
            

            </div>

             <div class="panel" id="step-shop-4" data-step="4">
                  <div class="shop-form-card">
                    <header class="panel__header text-center">
                      <h2 class="panel__title">Billing</h2>
                      <p class="panel__subheading">Lorem ipsum dolor sit amet.</p>
                     </header>
                    
                    <p class="panel__content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
              </div>


            
          </div>

          <div class="wizard__footer">
           <button type="button" class="previous cstm-btn">Previous</button>
           <button class="cstm-btn btn-submit next">Next</button>
        </div>
</form>
        </div>
        
        <h1 class="wizard__congrats-message">
              Congratulations, Your Shop is created successfully.
        </h1>
      </div>

                                        <!-- =============================== -->

                                       </div>
                                     </div>
                                  </div>

                              </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>


@endsection

@section('scripts')

<script type="text/javascript" src="{{url('/js/vendors/shop.js')}}"></script>

<!-- multistep js  -->
    <script>
  class Steps{
  constructor(wizard){
    this.wizard = wizard;
    this.steps = this.getSteps();
    this.stepsQuantity = this.getStepsQuantity();
    this.currentStep = 0;
  }
  
  setCurrentStep(currentStep){
    this.currentStep = currentStep;
  }
  
  getSteps(){
    return this.wizard.getElementsByClassName('step');
  }
  
  getStepsQuantity(){
    return this.getSteps().length;
  }
  
  handleConcludeStep(){
    this.steps[this.currentStep].classList.add('-completed');
  }
  
  handleStepsClasses(movement){
    if(movement > 0)
      this.steps[this.currentStep - 1].classList.add('-completed');
    else if(movement < 0)
      this.steps[this.currentStep].classList.remove('-completed');  
  }
}

class Panels{
  constructor(wizard){
    this.wizard = wizard;
    this.panelWidth = this.wizard.offsetWidth;
    this.panelsContainer = this.getPanelsContainer();
    this.panels = this.getPanels();
    this.currentStep = 0;
    
    this.updatePanelsPosition(this.currentStep);
    this.updatePanelsContainerHeight();
  }
  
  getCurrentPanelHeight(){
    return `${this.getPanels()[this.currentStep].offsetHeight}px`;
  }
  
  getPanelsContainer(){
    return this.wizard.querySelector('.panels');
  }
  
  getPanels(){
    return this.wizard.getElementsByClassName('panel');
  }
  
  updatePanelsContainerHeight(){
    this.panelsContainer.style.height = this.getCurrentPanelHeight();
  }
  
  updatePanelsPosition(currentStep){
    const panels = this.panels;
    const panelWidth = this.panelWidth;
    
    for (let i = 0; i < panels.length; i++) {
      panels[i].classList.remove(
         'movingIn',
         'movingOutBackward',
         'movingOutFoward'
      );
        
      if(i !== currentStep){
        if(i < currentStep) panels[i].classList.add('movingOutBackward');
        else if( i > currentStep ) panels[i].classList.add('movingOutFoward');
      }else{
        panels[i].classList.add('movingIn');
      }
    }
    
    this.updatePanelsContainerHeight();
  }
  
  setCurrentStep(currentStep){
    this.currentStep = currentStep;
    this.updatePanelsPosition(currentStep);
  }
}

class Wizard{
  constructor(obj){
    this.wizard = obj;
    this.panels = new Panels(this.wizard);
    this.steps = new Steps(this.wizard);
    this.stepsQuantity = this.steps.getStepsQuantity();
    this.currentStep = this.steps.currentStep;
    
    this.concludeControlMoveStepMethod = this.steps.handleConcludeStep.bind(this.steps);
    this.wizardConclusionMethod = this.handleWizardConclusion.bind(this);
  }
  
  updateButtonsStatus(){
    if(this.currentStep === 0)
      this.previousControl.classList.add('disabled');
    else
      this.previousControl.classList.remove('disabled');
  }
  
  updtadeCurrentStep(movement){   
    this.currentStep += movement;
    this.steps.setCurrentStep(this.currentStep);
    this.panels.setCurrentStep(this.currentStep);
    
    this.handleNextStepButton();
    this.updateButtonsStatus();
  }
  
  handleNextStepButton(){   
    if(this.currentStep === this.stepsQuantity - 1){      
      this.nextControl.innerHTML = 'Finish';
      
      this.nextControl.removeEventListener('click', this.nextControlMoveStepMethod);
      this.nextControl.addEventListener('click', this.concludeControlMoveStepMethod);
      this.nextControl.addEventListener('click', this.wizardConclusionMethod);
    }else{
      this.nextControl.innerHTML = 'Next';
      
      this.nextControl.addEventListener('click', this.nextControlMoveStepMethod);
      this.nextControl.removeEventListener('click', this.concludeControlMoveStepMethod);
      this.nextControl.removeEventListener('click', this.wizardConclusionMethod);
    }
  }
  
  handleWizardConclusion(){
    this.wizard.classList.add('completed');
  };
  
  addControls(previousControl, nextControl){
    this.previousControl = previousControl;
    this.nextControl = nextControl;
    this.previousControlMoveStepMethod = this.moveStep.bind(this, -1);
    this.nextControlMoveStepMethod = this.moveStep.bind(this, 1);
    
    previousControl.addEventListener('click', this.previousControlMoveStepMethod);
    nextControl.addEventListener('click', this.nextControlMoveStepMethod);
    
    this.updateButtonsStatus();
  }
  
  moveStep(movement){
    if(this.validateMovement(movement)){
      this.updtadeCurrentStep(movement);
      this.steps.handleStepsClasses(movement);
    }else{
       throw('This was an invalid movement');
    }
  }
  
  validateMovement(movement){
    const fowardMov = movement > 0 && this.currentStep < this.stepsQuantity - 1;
    const backMov = movement < 0 && this.currentStep > 0;
    
    return fowardMov || backMov;
  }
}

let wizardElement = document.getElementById('wizard');
let wizard = new Wizard(wizardElement);
let buttonNext = document.querySelector('.next');
let buttonPrevious = document.querySelector('.previous');

wizard.addControls(buttonPrevious, buttonNext);

    </script>











@endsection