<!-- Modal -->
<div class="modal fade" id="{{isset($index) ? 'editModel'.$index : 'createModel'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SettingLanguage">{{isset($index) ? $lang->title3 : $lang->title2}}</h5>
        <button type="button" onclick="closeForm('{{isset($index) ? "#editModel".$index : "#createModel"}}')" class="btn btn-dark">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="{{isset($index) ? 'editForm'.$index : 'createForm'}}" action="{{isset($index) ? route('editBranchRays') : route('addBranchRays')}}" method="POST">
            @csrf
            @isset($index)
                @include('my_id', ['myAppId'=>$index])
            @endisset
                <div class="container">
                    <div class="row">
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <img class="style_icon_menu" src="{{asset('/lib/icons/hospital.svg')}}"/>
                                </div>
                                <input 
                                minlength="3" 
                                required
                                oninvalid="handleInput(this ,'{{$lang->error1}}', '{{$lang->error10}}')"
                                oninput="handleInput(this ,'{{$lang->error1}}', '{{$lang->error10}}')"
                                id="brance-rays-name" type="text" class="form-control" name="brance_rays_name" value="{{isset($index) ? $branch->getName() : ''}}" title="{{$lang->hint1}}" placeholder="{{$lang->hint1}}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <img class="style_icon_menu" src="{{asset('/lib/icons/telephone.svg')}}"/>
                                </div>
                                <input 
                                pattern="^[0-9]{11}$" 
                                required
                                oninvalid="handleInputPhone(this ,'{{$lang->error2}}', '{{$lang->error11}}')"
                                oninput="handleInputPhone(this ,'{{$lang->error2}}', '{{$lang->error11}}')"
                                id="brance-rays-phone" inputmode="tel" class="form-control" name="brance_rays_phone" value="{{isset($index) ? $branch->getPhone() : ''}}" title="{{$lang->hint2}}" placeholder="{{ $lang->hint2 }}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <img class="style_icon_menu" src="{{asset('/lib/icons/geo-alt.svg')}}"/>
                                </div>
                                    <input 
                                    minlength="3" 
                                    required
                                    oninvalid="handleInput(this ,'{{$lang->error8}}', '{{$lang->error17}}')"
                                    oninput="handleInput(this ,'{{$lang->error8}}', '{{$lang->error17}}')"
                                    id="brance-rays-country" type="text" class="form-control" name="brance_rays_country" value="{{isset($index) ? $branch->getCountry() : ''}}" title="{{$lang->hint3}}" placeholder="{{ $lang->hint3 }}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <img class="style_icon_menu" src="{{asset('/lib/icons/geo-alt.svg')}}"/>
                                </div>
                                <input 
                                minlength="3" 
                                required
                                oninvalid="handleInput(this ,'{{$lang->error3}}', '{{$lang->error12}}')"
                                oninput="handleInput(this ,'{{$lang->error3}}', '{{$lang->error12}}')"
                                id="brance-rays-governments" type="text" class="form-control" name="brance_rays_governments" value="{{isset($index) ? $branch->getGovernments() : ''}}" title="{{$lang->hint4}}" placeholder="{{ $lang->hint4 }}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <img class="style_icon_menu" src="{{asset('/lib/icons/geo-alt.svg')}}"/>
                                </div>
                                <input 
                                minlength="3" 
                                required
                                oninvalid="handleInput(this ,'{{$lang->error4}}', '{{$lang->error13}}')"
                                oninput="handleInput(this ,'{{$lang->error4}}', '{{$lang->error13}}')"
                                id="brance-rays-city" type="text" class="form-control" name="brance_rays_city" value="{{isset($index) ? $branch->getCity() : ''}}" title="{{$lang->hint5}}" placeholder="{{ $lang->hint5 }}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <img class="style_icon_menu" src="{{asset('/lib/icons/geo-alt.svg')}}"/>
                                </div>
                                <input 
                                minlength="3" 
                                required
                                oninvalid="handleInput(this ,'{{$lang->error5}}', '{{$lang->error14}}')"
                                oninput="handleInput(this ,'{{$lang->error5}}', '{{$lang->error14}}')"
                                id="brance-rays-street" type="text" class="form-control" name="brance_rays_street" value="{{isset($index) ? $branch->getStreet() : ''}}" title="{{$lang->hint6}}" placeholder="{{ $lang->hint6 }}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <img class="style_icon_menu" src="{{asset('/lib/icons/geo-alt.svg')}}"/>
                                </div>
                                <input 
                                minlength="3" 
                                required
                                oninvalid="handleInput(this ,'{{$lang->error6}}', '{{$lang->error15}}')"
                                oninput="handleInput(this ,'{{$lang->error6}}', '{{$lang->error15}}')"
                                id="brance-rays-building" type="text" class="form-control" name="brance_rays_building" value="{{isset($index) ? $branch->getBuilding() : ''}}" title="{{$lang->hint7}}" placeholder="{{ $lang->hint7 }}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <img class="style_icon_menu" src="{{asset('/lib/icons/geo-alt.svg')}}"/>
                                </div>
                                <input 
                                minlength="3" 
                                required
                                oninvalid="handleInput(this ,'{{$lang->error7}}', '{{$lang->error16}}')"
                                oninput="handleInput(this ,'{{$lang->error7}}', '{{$lang->error16}}')"
                                id="brance-rays-address" type="text" class="form-control" name="brance_rays_address" value="{{isset($index) ? $branch->getAddress() : ''}}" title="{{$lang->hint8}}" placeholder="{{ $lang->hint8 }}">
                            </div>
                        </div>
                        <div class="col-lg-auto pt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <img class="style_icon_menu" src="{{asset('/lib/icons/geo-alt.svg')}}"/>
                                </div>
                                <select
                                title="{{$lang->selectBox1}}"
                                required
                                oninvalid="handleInputSelect(this, '{{$lang->error9}}')"
                                oninput="handleInputSelect(this, '{{$lang->error9}}')"
                                class="form-select" id="brance-rays-follow" name="brance_rays_follow"  aria-label="Default select example">
                                    <option value="" selected disabled>{{ $lang->selectBox1 }}</option>
                                    @foreach($lang->branchInputOutput as $key=>$inpBranch)
                                    <option {{isset($index) && $branch->getFollowId() === $inpBranch ? 'selected' : ''}} value="{{ $key}}">{{ $inpBranch }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="{{isset($index) ? 'editForm'.$index : 'createForm'}}" class="btn btn-primary" onclick="validForm('{{isset($index) ? '#editForm'.$index : '#createForm'}}')">{{isset($index) ? $lang->button3 : $lang->button2}}</button>
      </div>
    </div>
  </div>
</div>