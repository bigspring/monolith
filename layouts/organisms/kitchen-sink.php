<?php
/**
 * The kitchen sink organism for testing all foundation elements
 *
 * @package monolith
 */
?>

<!-- start kitchen sink -->
<h1 id="kitchen-sink">Kitchen sink</h1>
<h3 class="subheader">This page includes every single Foundation element so that we can make sure things work together smoothly.</h3>

<h4 id="joyride">Joyride</h4>
<div>
<a class="secondary button" id="start-jr" name="start-jr">Start Joyride</a>

<h5 class="so-awesome" id="numero1">Build Joyride with HTML</h5>

<p class="so-awesome" id="numero2">Stop Number 2 for You!</p><!--stops-->

<ol class="joyride-list" data-joyride="">
  <li data-class="custom so-awesome" data-id="numero1" data-text="Next">
    <h4>Stop #1</h4>

    <p>You can control all the details for your tour stop. Any valid HTML will
    work inside of Joyride.</p>
  </li>

  <li data-button="Next" data-id="numero2">
    <h4>Stop #2</h4>

    <p>Get the details right by styling Joyride with a custom stylesheet!</p>
  </li>

  <li data-button="Next">
    <h4>Stop #3</h4>

    <p>It works as a modal too!</p>
  </li>
</ol>
</div>



<hr>
<h4 id="alert-boxes">Alert Boxes</h4>
<div data-alert="" class="alert-box radius">
  This is a standard alert (div.alert-box.radius).
  <a href="" class="close">×</a>
</div>

<div data-alert="" class="alert-box success">
  This is a success alert (div.alert-box.success).
  <a href="" class="close">×</a>
</div>

<div data-alert="" class="alert-box alert round">
  This is an alert (div.alert-box.alert.round).
  <a href="" class="close">×</a>
</div>

<div data-alert="" class="alert-box secondary">
  This is a secondary alert (div.alert-box.secondary).
  <a href="" class="close">×</a>
</div>


<hr>
<h4 id="block-grid">Block Grid</h4>
<ul class="small-block-grid-2 large-block-grid-4">
  <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/comet-th.jpg"></li>
  <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/launch-th.jpg"></li>
  <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/space-th.jpg"></li>
  <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/spacewalk-th.jpg"></li>
</ul>

<hr>
<h4 id="breadcrumbs">Breadcrumbs</h4>
<ul class="breadcrumbs">
  <li><a href="#">Home</a></li>
  <li><a href="#">Features</a></li>
  <li class="unavailable"><a href="#">Gene Splicing</a></li>
  <li class="current"><a href="#">Cloning</a></li>
</ul>

<hr>
<h4 id="buttons">Buttons</h4>
<div class="row">
  <div class="small-6 large-6 columns">
    <a href="#" class="tiny button">.tiny.button</a><br>
    <a href="#" class="small button">.small.button</a><br>
    <a href="#" class="button">.button</a><br>
    <a href="#" class="button expand">.expand</a><br>
  </div>
  <div class="small-6 large-6 columns">
    <a href="#" class="tiny button secondary">.tiny.secondary</a><br>
    <a href="#" class="small button success radius">.small.success.radius</a><br>
    <a href="#" class="button alert round disabled">.round.disabled</a><br>

  </div>
</div>

<hr>
<h4 id="button-groups">Button Groups</h4>
<ul class="button-group">
  <li><a href="#" class="small button">Button 1</a></li>
  <li><a href="#" class="small button">Button 2</a></li>
  <li><a href="#" class="small button">Button 3</a></li>
</ul>
<ul class="button-group radius">
  <li><a href="#" class="button secondary">Button 1</a></li>
  <li><a href="#" class="button secondary">Button 2</a></li>
  <li><a href="#" class="button secondary">Button 3</a></li>
  <li><a href="#" class="button secondary">Button 4</a></li>
</ul>
<ul class="button-group round even-3">
  <li><a href="#" class="button alert">Button 1</a></li>
  <li><a href="#" class="button alert">Button 2</a></li>
  <li><a href="#" class="button alert">Button 3</a></li>
</ul>
<ul class="button-group round even-3">
  <li><input class="button success" value="Button 1" type="submit"></li>
  <li><input class="button success" value="Button 2" type="submit"></li>
  <li><input class="button success" value="Button 3" type="submit"></li>
</ul>

<hr>
<h4 id="dropdown-buttons">Dropdown Buttons</h4>
<ul id="drop" class="f-dropdown content" data-dropdown-content="">
  <li><a href="#">This is a link</a></li>
  <li><a href="#">This is another</a></li>
  <li><a href="#">Yet another link</a></li>
</ul>

<p><a aria-expanded="false" href="#" data-dropdown="drop" class="tiny button dropdown">Tiny Dropdown Button</a><br>
<a aria-expanded="false" href="#" data-dropdown="drop" class="small secondary radius button dropdown">Small Secondary Radius Dropdown Button</a><br>
<a aria-expanded="false" href="#" data-dropdown="drop" class="button alert round dropdown">Button Alert Round Dropdown Button</a><br>
<a aria-expanded="false" href="#" data-dropdown="drop" class="large success button dropdown">Large Success Dropdown Button</a><br>
<a aria-expanded="false" href="#" data-dropdown="drop" class="large button dropdown expand">Large Expanded Dropdown Button</a></p>
<hr>
<h4 id="split-buttons">Split Buttons</h4>
<p> <a href="#" class="tiny button split">Tiny Split Button <span aria-expanded="false" data-dropdown="drop"></span></a><br>
 <a href="#" class="small secondary radius button split">Small Secondary Radius Split Button <span aria-expanded="false" data-dropdown="drop"></span></a><br>
 <a href="#" class="button alert round split">Round Alert Split Button <span aria-expanded="false" data-dropdown="drop"></span></a><br>
 <a href="#" class="large success button split">Large Success Split Button <span aria-expanded="false" data-dropdown="drop"></span></a></p>
<hr>
<h4 id="switches">Switches</h4>
<div class="small-2 switch tiny">
   <input id="a" name="switch-a" checked="" type="radio">
   <label for="a" onclick="">Off</label>

   <input id="a1" name="switch-a" type="radio">
   <label for="a1" onclick="">On</label>

   <span></span>
 </div>

 <div class="small-3 switch small">
   <input id="b" name="switch-b" checked="" type="radio">
   <label for="b" onclick="">Off</label>

   <input id="b1" name="switch-b" type="radio">
   <label for="b1" onclick="">On</label>

   <span></span>
 </div>

 <div class="small-4 switch radius">
   <input id="c" name="switch-c" checked="" type="radio">
   <label for="c" onclick="">Off</label>

   <input id="c1" name="switch-c" type="radio">
   <label for="c1" onclick="">On</label>

   <span></span>
 </div>

 <div class="small-6 switch large round">
   <input id="d" name="switch-d" checked="" type="radio">
   <label for="d" onclick="">Off</label>

   <input id="d1" name="switch-d" type="radio">
   <label for="d1" onclick="">On</label>

   <span></span>
 </div>


<hr>
<h4 id="clearing">Clearing</h4>
<div>
  <div class="clearing-assembled"><div><a href="#" class="clearing-close">×</a><div class="visible-img" style="display: none"><div class="clearing-touch-label"></div><img src="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg" alt=""><p class="clearing-caption"></p><a href="#" class="clearing-main-prev"><span></span></a><a href="#" class="clearing-main-next"><span></span></a></div><div class="carousel"><ul class="clearing-thumbs" data-clearing="">
    <li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/earth-th-sm.jpg"><img data-caption="Nulla vitae elit libero, a pharetra augue. Cras mattis consectetur purus sit amet fermentum." src="http://foundation.zurb.com/docs/assets/img/examples/earth-th-sm.jpg"></a></li>

    <li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"><img src="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"></a></li>

    <li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"><img data-caption="Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus." src="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"></a></li>

    <li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"><img src="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"></a></li>

    <li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"><img data-caption="Integer posuere erat a ante venenatis dapibus posuere velit aliquet." src="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg"></a></li>
  </ul></div></div></div>
</div>


<hr>
<h4 id="forms">Forms</h4>
<form>
  <fieldset>
    <legend>Fieldset</legend>

    <div class="row">
      <div class="large-12 columns">
        <label>Input Label</label>
        <input placeholder="large-12.columns" type="text">
      </div>
    </div>

    <div class="row">
      <div class="large-4 columns">
        <label>Input Label</label>
        <input placeholder="large-4.columns" type="text">
      </div>
      <div class="large-4 columns">
        <label>Input Label</label>
        <input placeholder="large-4.columns" type="text">
      </div>
      <div class="large-4 columns">
        <div class="row collapse">
          <label>Input Label</label>
          <div class="small-9 columns">
            <input placeholder="small-9.columns" type="text">
          </div>
          <div class="small-3 columns">
            <span class="postfix">.com</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        <label>Textarea Label</label>
        <textarea placeholder="small-12.columns"></textarea>
      </div>
    </div>

  </fieldset>
</form>

<hr>
<h4 id="dropdowns">Dropdowns</h4>
<p><a class="button" data-dropdown="tinyDrop" href="#">Link Dropdown »</a>
  <a class="button" data-dropdown="contentDrop" href="#">Content Dropdown »</a>
  <!-- Dropdowns --></p>
  <ul class="f-dropdown" data-dropdown-content="" id="tinyDrop">
    <li><a href="#">This is a link</a></li>

    <li><a href="#">This is another</a></li>

    <li><a href="#">Yet another</a></li>
  </ul>

  <div class="f-dropdown content medium" data-dropdown-content="" id="contentDrop">
    <h4>Title</h4>

    <p>Some text that people will think is awesome! Some text that people will
    think is awesome! Some text that people will think is awesome!</p><img src="../assets/img/examples/launch.jpg">

    <p>Launching a Discovery Mission</p><a class="button" href="#">Button</a>
  </div>


<hr>
<h4 id="flex-video">Flex Video</h4>
<div class="flex-video">
  <iframe src="http://www.youtube.com/embed/0_EW8aNgKlA" allowfullscreen="" width="420" frameborder="0" height="315"></iframe>
</div>

<hr>
<h4 id="inline-lists">Inline Lists</h4>
<ul class="inline-list">
  <li><a href="#">Link 1</a></li>
  <li><a href="#">Link 2</a></li>
  <li><a href="#">Link 3</a></li>
  <li><a href="#">Link 4</a></li>
  <li><a href="#">Link 5</a></li>
</ul>

<hr>
<h4 id="keystroke">Keystroke</h4>
<p>To make something pretty, press and hold <kbd>cmd + alt + shift + w + a + !</kbd></p>
<hr>
<h4 id="labels">Labels</h4>
<p>
  <span class="label">Regular Label</span><br>
  <span class="radius secondary label">Radius Secondary Label</span><br>
  <span class="round alert label">Round Alert Label</span><br>
  <span class="success label">Success Label</span><br>
</p>

<hr>
<h4 id="magellan">Magellan</h4>
<div style="" class="magellan-container" data-magellan-expedition="fixed">
  <dl class="sub-nav">
    <dd class="" data-magellan-arrival="build"><a href="#build">Build with HTML</a></dd>
    <dd class="" data-magellan-arrival="js"><a href="#js">Using Javascript</a></dd>
  </dl>
</div>

<p><a name="build"></a></p>
<p></p><h5 data-magellan-destination="build">Build With Predefined HTML Structure</h5><p></p>
<p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vestibulum id ligula porta felis euismod semper.</p>

<p><a name="js"></a></p>
<p></p><h5 data-magellan-destination="js">Awesome JS Goodness</h5><p></p>
<p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vestibulum id ligula porta felis euismod semper.</p>

<hr>
<h4 id="orbit">Orbit</h4>
<div class="row">
  <div class="large-12 columns">
    <div class="orbit-container"><ul style="height: 280px;" class="orbit-slides-container" id="featured1" data-orbit="" data-options="timer_speed:5000;">
      <li style="z-index: 2; margin-left: 100%;" class="">
        <img src="http://foundation.zurb.com/docs/assets/img/examples/satelite-orbit.jpg">
        <div class="orbit-caption">
          Caption One. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        </div>
      </li>
      <li class="active" style="z-index: 4; margin-left: 0%;">
        <img src="http://foundation.zurb.com/docs/assets/img/examples/andromeda-orbit.jpg">
        <div class="orbit-caption">
          Caption Two. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        </div>
      </li>
      <li>
        <img src="http://foundation.zurb.com/docs/assets/img/examples/launch-orbit.jpg">
        <div class="orbit-caption">
          Caption Three. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        </div>
      </li>
    </ul><a class="orbit-prev" href="#"><span></span></a><a class="orbit-next" href="#"><span></span></a><div class="orbit-timer paused"><span></span><div style="width: 15.94%;" class="orbit-progress"></div></div><div class="orbit-slide-number"><span>2</span> of <span>3</span></div><div class="orbit-bullets-container"><ol class="orbit-bullets"><li class="" data-orbit-slide="0"></li><li class="active" data-orbit-slide="1"></li><li data-orbit-slide="2"></li></ol></div></div>
  </div>
</div>

<hr>
<h4 id="pagination">Pagination</h4>
<ul class="pagination">
  <li class="arrow unavailable"><a href="">«</a></li>
  <li class="current"><a href="">1</a></li>
  <li><a href="">2</a></li>
  <li><a href="">3</a></li>
  <li><a href="">4</a></li>
  <li class="unavailable"><a href="">…</a></li>
  <li><a href="">12</a></li>
  <li><a href="">13</a></li>
  <li class="arrow"><a href="">»</a></li>
</ul>

<hr>
<h4 id="panels">Panels</h4>
<div class="row">
  <div class="large-6 columns">
    <div class="panel">
      <h5>This is a regular panel.</h5>
      <p>It has an easy to override visual style, and is appropriately subdued.</p>
    </div>
  </div>
  <div class="large-6 columns">
    <div class="panel callout radius">
      <h5>This is a radius callout panel.</h5>
      <p>It's a little ostentatious, but useful for important content.</p>
    </div>
  </div>

<p></p></div><p></p>
<h4 id="pricing-tables">Pricing Tables</h4>
<div class="row">
  <div class="large-4 columns">
    <ul class="pricing-table">
      <li class="title">Standard</li>
      <li class="price">$99.99</li>
      <li class="description">An awesome description</li>
      <li class="bullet-item">1 Database</li>
      <li class="bullet-item">5GB Storage</li>
      <li class="bullet-item">20 Users</li>
      <li class="cta-button"><a class="button" href="#">Buy Now</a></li>
    </ul>
  </div>
</div>

<hr>
<h4 id="progress-bars">Progress Bars</h4>
<div class="progress large-6"><span class="meter" style="width: 40%"></span></div>
<div class="radius progress success large-8"><span class="meter" style="width: 80%"></span></div>
<div class="nice round progress alert large-10"><span class="meter" style="width: 30%"></span></div>
<div class="nice secondary progress"><span class="meter" style="width: 50%"></span></div>

<hr>
<h4 id="reveal">Reveal</h4>
<p><a href="#" data-reveal-id="firstModal" class="radius button">Example Modal…</a>
<a href="#" data-reveal-id="videoModal" class="radius button">Example Video Modal…</a></p>
<!-- Reveal Modals begin -->
<div id="firstModal" class="reveal-modal" data-reveal="">
  <h2>This is a modal.</h2>
  <p>Reveal makes these very easy to summon and dismiss. The close button is simply an anchor with a unicode character icon and a class of <code>close-reveal-modal</code>. Clicking anywhere outside the modal will also dismiss it.</p>
  <p>Finally, if your modal summons another Reveal modal, the plugin will handle that for you gracefully.</p>
  <p><a href="#" data-reveal-id="secondModal" class="secondary button">Second Modal…</a></p>
  <a class="close-reveal-modal">×</a>
</div>

<div id="secondModal" class="reveal-modal" data-reveal="">
  <h2>This is a second modal.</h2>
  <p>See? It just slides into place after the first modal. Very handy when you need subsequent dialogs, or when a modal option impacts or requires another decision.</p>
  <a class="close-reveal-modal">×</a>
</div>

<div id="videoModal" class="reveal-modal large" data-reveal="">
  <h2>This modal has video</h2>
  <div class="flex-video">
          <iframe src="//www.youtube.com/embed/aiBt44rrslw" allowfullscreen="" width="420" frameborder="0" height="315"></iframe>
  </div>

  <a class="close-reveal-modal">×</a>
</div>
<!-- Reveal Modals end -->

<hr>
<h4 id="sliders">Sliders</h4>
<div class="range-slider" data-slider="50">
    <span aria-valuenow="50" aria-valuemax="100" aria-valuemin="0" style="transform: translateX(451.5px);" class="range-slider-handle"></span>
    <span style="width: 50%;" class="range-slider-active-segment"></span>
    <input value="50" type="hidden">
</div>
<div class="range-slider radius" data-slider="50">
    <span aria-valuenow="50" aria-valuemax="100" aria-valuemin="0" style="transform: translateX(451.5px);" class="range-slider-handle"></span>
    <span style="width: 50%;" class="range-slider-active-segment"></span>
    <input value="50" type="hidden">
</div>
<div class="range-slider round" data-slider="50">
    <span aria-valuenow="50" aria-valuemax="100" aria-valuemin="0" style="transform: translateX(451.5px);" class="range-slider-handle"></span>
    <span style="width: 50%;" class="range-slider-active-segment"></span>
    <input value="50" type="hidden">
</div>
<div class="range-slider" data-slider="40" data-options="step: 20;">
    <span aria-valuenow="40" aria-valuemax="100" aria-valuemin="0" style="transform: translateX(361px);" class="range-slider-handle"></span>
    <span style="width: 40%;" class="range-slider-active-segment"></span>
    <input value="40" type="hidden">
</div>


<hr>
<h4 id="accordion">Accordion</h4>
<dl class="accordion" data-accordion="">
  <dd>
    <a href="#panel1">Accordion 1</a>
    <div id="panel1" class="content active">
      <dl class="tabs" data-tab="">
        <dd class="active"><a href="#panel1-1">Tab 1</a></dd>
        <dd><a href="#panel1-2">Tab 2</a></dd>
        <dd><a href="#panel1-3">Tab 3</a></dd>
        <dd><a href="#panel1-4">Tab 4</a></dd>
      </dl>
      <div class="tabs-content">
        <div class="content active" id="panel1-1">
          <p>First panel content goes here...</p>
        </div>
        <div class="content" id="panel1-2">
          <p>Second panel content goes here...</p>
        </div>
        <div class="content" id="panel1-3">
          <p>Third panel content goes here...</p>
        </div>
        <div class="content" id="panel1-4">
          <p>Fourth panel content goes here...</p>
        </div>
      </div>
    </div>
  </dd>
  <dd>
    <a href="#panel2">Accordion 2</a>
    <div id="panel2" class="content">
      Panel 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </dd>
  <dd>
    <a href="#panel3">Accordion 3</a>
    <div id="panel3" class="content">
      Panel 3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </dd>
</dl>

<hr>
<h4 id="tabs">Tabs</h4>
<dl class="tabs" data-tab="">
  <dd class="active"><a href="#panel2-1">Tab 1</a></dd>
  <dd><a href="#panel2-2">Tab 2</a></dd>
  <dd><a href="#panel2-3">Tab 3</a></dd>
  <dd><a href="#panel2-4">Tab 4</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel2-1">
    <p>First panel content goes here...</p>
  </div>
  <div class="content" id="panel2-2">
    <p>Second panel content goes here...</p>
  </div>
  <div class="content" id="panel2-3">
    <p>Third panel content goes here...</p>
  </div>
  <div class="content" id="panel2-4">
    <p>Fourth panel content goes here...</p>
  </div>
</div>

<dl class="tabs vertical" data-tab="">
  <dd class="active"><a href="#panel1a">Tab 1</a></dd>

  <dd><a href="#panel2a">Tab 2</a></dd>

  <dd><a href="#panel3a">Tab 3</a></dd>

  <dd><a href="#panel4a">Tab 4</a></dd>
</dl>

<div class="tabs-content vertical">
  <div class="content active" id="panel1a">
    <p>Panel 1 content goes here.</p>
  </div>

  <div class="content" id="panel2a">
    <p>Panel 2 content goes here.</p>
  </div>

  <div class="content" id="panel3a">
    <p>Panel 3 content goes here.</p>
  </div>

  <div class="content" id="panel4a">
    <p>Panel 4 content goes here.</p>
  </div>
</div>



<hr>
<h4 id="side-nav">Side Nav</h4>
<div class="row">
  <div class="large-4 columns end">
    <ul class="side-nav">
      <li class="active"><a href="#">Link 1</a></li>
      <li><a href="#">Link 2</a></li>
      <li class="divider"></li>
      <li><a href="#">Link 3</a></li>
      <li><a href="#">Link 4</a></li>
    </ul>
  </div>
</div>

<hr>
<h4 id="sub-nav">Sub Nav</h4>
<dl class="sub-nav">
  <dt>Filter:</dt>
  <dd class="active"><a href="#">All</a></dd>
  <dd><a href="#">Active</a></dd>
  <dd><a href="#">Pending</a></dd>
  <dd><a href="#">Suspended</a></dd>
</dl>

<hr>
<h4 id="tables">Tables</h4>
<table>
  <thead>
    <tr>
      <th width="200">Table Header</th>
      <th>Table Header</th>
      <th width="150">Table Header</th>
      <th width="150">Table Header</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Content Goes Here</td>
      <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
      <td>Content Goes Here</td>
      <td>Content Goes Here</td>
    </tr>
    <tr>
      <td>Content Goes Here</td>
      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
      <td>Content Goes Here</td>
      <td>Content Goes Here</td>
    </tr>
    <tr>
      <td>Content Goes Here</td>
      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
      <td>Content Goes Here</td>
      <td>Content Goes Here</td>
    </tr>
  </tbody>
</table>

<hr>
<h4 id="thumbnails">Thumbnails</h4>
<p><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/earth-th-sm.jpg"><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/space-th-sm.jpg"></p>
<hr>
<h4 id="tooltips">Tooltips</h4>
<p>The tooltips can be positioned on the <span title="" aria-describedby="tooltip-i1nk4nfj0" data-selector="tooltip-i1nk4nfj0" data-tooltip="" class="has-tip" data-width="210">"tip-bottom"</span>, which is the default position, <span title="" aria-describedby="tooltip-i1nk4nfj1" data-selector="tooltip-i1nk4nfj1" data-tooltip="" class="has-tip tip-top noradius" data-width="210">"tip-top" (hehe)</span>, <span title="" data-tooltip="left" class="has-tip tip-left" data-width="90">"tip-left"</span>, or <span title="" data-tooltip="right" class="has-tip tip-right" data-width="120">"tip-right"</span> of the target element by adding the appropriate class to them. You can even add your own custom class to style each tip differently. On a small device, the tooltips are full width and bottom aligned.</p>

<hr>
<h4 id="top-bar">Top Bar</h4>
 <nav class="top-bar" data-topbar="">
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="#">
            Top Bar Title
          </a>
        </h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
    </ul>

    
  <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="divider"></li>
        <li class="has-dropdown not-click">
          <a href="#">Main Item 1</a>
          <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Main Item 1</a></li>
            <li><label>Section Name</label></li>
            <li class="has-dropdown not-click">
              <a href="#" class="">Has Dropdown, Level 1</a>
              <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Has Dropdown, Level 1</a></li>
                <li><a href="#">Dropdown Options</a></li>
                <li><a href="#">Dropdown Options</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Subdropdown Option</a></li>
                <li><a href="#">Subdropdown Option</a></li>
                <li><a href="#">Subdropdown Option</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li class="divider"></li>
            <li><label>Section Name</label></li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
          </ul>
        </li>
        <li class="divider"></li>
        <li class="has-dropdown not-click">
          <a href="#">Main Item 2</a>
          <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Main Item 2</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li><a href="#">Dropdown Option</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
          </ul>
        </li>
      </ul>
    </section></nav>

  <!-- End Top Bar -->

<hr>
<h4 id="type">Type</h4>
<div class="type-demo">

<h1>h1. This is a very large header.</h1>
<h2>h2. This is a large header.</h2>
<h3>h3. This is a medium header.</h3>
<h4>h4. This is a moderate header.</h4>
<h5>h5. This is a small header.</h5>
<h6>h6. This is a tiny header.</h6>

<br>

<h1 class="subheader">h1. subheader</h1>
<h2 class="subheader">h2. subheader</h2>
<h3 class="subheader">h3. subheader</h3>
<h4 class="subheader">h4. subheader</h4>
<h5 class="subheader">h5. subheader</h5>
<h6 class="subheader">h6. subheader</h6>

<hr>

<h3>Definition List</h3>
<h5>Definition lists are great for small block of copy that describe the header</h5>
<dl>
<dt>Lower cost</dt>
  <dd>The new version of this product costs significantly less than the previous one!</dd>
<dt>Easier to use</dt>
  <dd>We've changed the product so that it's much easier to use!</dd>
<dt>Safe for kids</dt>
  <dd>You can leave your kids alone in a room with this product and they won't get hurt (not a guarantee).</dd>
</dl>
<hr>

<h5>Un-ordered lists are great for making quick outlines bulleted.</h5>
<ul class="disc">
  <li>List item with a much longer description or more content.</li>
  <li>List item</li>
  <li>List item
    <ul>
      <li>Nested List Item</li>
      <li>Nested List Item</li>
      <li>Nested List Item</li>
    </ul>
  </li>
  <li>List item</li>
  <li>List item</li>
  <li>List item</li>
</ul>

<h5>Ordered lists are great for lists that need order, duh.</h5>
<ol>
  <li>List Item 1</li>
  <li>List Item 2</li>
  <li>List Item 3</li>
</ol>



<br>
<h5>Blockquote</h5>
<blockquote>I do not fear computers. I fear the lack of them. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.<cite>Isaac Asimov</cite></blockquote>

<br>
<h5>Vcard</h5>
<ul class="vcard">
  <li class="fn">Gaius Baltar</li>
  <li class="street-address">123 Colonial Ave.</li>
  <li class="locality">Caprica City</li>
  <li><span class="state">Caprica</span>, <span class="zip">12345</span></li>
  <li class="email"><a href="#">g.baltar@example.com<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l,b=document.getElementsByTagName("script");l=b[b.length-1].previousSibling;a=l.getAttribute('data-cfemail');if(a){s='';r=parseInt(a.substr(0,2),16);for(j=2;a.length-j;j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}s=document.createTextNode(s);l.parentNode.replaceChild(s,l);}}catch(e){}})();
/* ]]> */
</script></a></li>
</ul>

</div>

<hr>
<h4 id="visibility-classes">Visibility Classes</h4>
<h5 id="screen-size-visibility-control-show-">Screen Size Visibility Control (Show)</h5>
<p>The following text should describe the screen size you're using:</p>
<p class="panel">
  <strong class="show-for-small">You are on a small screen.</strong>
  <strong class="show-for-medium">You are on a medium screen.</strong>
  <strong class="show-for-medium-up">You are on a medium, large or xlarge screen.</strong>
  <strong class="show-for-medium-down">You are on a medium or small screen.</strong>
  <strong class="show-for-large">You are on a large screen.</strong>
  <strong class="show-for-large-up">You are on a large or xlarge screen.</strong>
  <strong class="show-for-large-down">You are on a large, medium or small screen.</strong>
  <strong class="show-for-xlarge">You are on a xlarge screen.</strong>
</p>

<h5 id="screen-size-visibility-control-hide-">Screen Size Visibility Control (Hide)</h5>
<p>The following text should describe the screen size you aren't using:</p>
<p class="panel">
  <strong class="hide-for-small">You are <em>not</em> on a small screen.</strong>
  <strong class="hide-for-medium">You are <em>not</em> on a medium screen.</strong>
  <strong class="hide-for-medium-up">You are <em>not</em> on a medium, large or xlarge screen.</strong>
  <strong class="hide-for-medium-down">You are <em>not</em> on a medium or small screen.</strong>
  <strong class="hide-for-large">You are <em>not</em> on a large screen.</strong>
  <strong class="hide-for-large-up">You are <em>not</em> on a large or xlarge screen.</strong>
  <strong class="hide-for-large-down">You are <em>not</em> on a large, medium or small screen.</strong>
  <strong class="hide-for-xlarge">You are <em>not</em> on a xlarge screen.</strong>
</p>

<h5 id="orientation-detection">Orientation Detection</h5>
<p>The following text should describe the device orientation you're using:</p>
<p class="panel">
  <strong class="show-for-landscape">You are in landscape orientation.</strong>
  <strong class="show-for-portrait">You are in portrait orientation.</strong>
</p>

<h5 id="touch-detection">Touch Detection</h5>
<p>The following text should describe if you're using a touch device:</p>
<p class="panel">
  <strong class="show-for-touch">You are on a touch-enabled device.</strong>
  <strong class="hide-for-touch">You are not on a touch-enabled device.</strong>
</p>
<!-- end kitchen sink -->           