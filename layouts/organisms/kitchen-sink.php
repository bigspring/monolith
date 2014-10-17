<hr /><code>Typo</code><hr />

<h1>Heading One</h1>
<h2>Heading Two</h2>
<h3>Heading Three</h3>
<h4>Heading Four</h4>
<h5>Heading Five</h5>
<h6>Heading Six</h6>
<p class="lead">Hello I am lead text</p>

<hr /><code>Table</code><hr />

<table class="table table-condensed">
    <thead>
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <td>3</td>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>
<hr />

<hr /><code>Form</code><hr />

<form role="form">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Check me out
        </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<hr /><code>Buttons</code><hr />

<!-- Standard button -->
<button type="button" class="btn btn-default">Default</button>

<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<button type="button" class="btn btn-primary">Primary</button>

<!-- Indicates a successful or positive action -->
<button type="button" class="btn btn-success">Success</button>

<!-- Contextual button for informational alert messages -->
<button type="button" class="btn btn-info">Info</button>

<!-- Indicates caution should be taken with this action -->
<button type="button" class="btn btn-warning">Warning</button>

<!-- Indicates a dangerous or potentially negative action -->
<button type="button" class="btn btn-danger">Danger</button>

<!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
<button type="button" class="btn btn-link">Link</button>

<hr /><code>Images</code><hr />

<img src="holder.js/100x100" class="img-rounded">
<img src="holder.js/100x100" class="img-circle">
<img src="holder.js/100x100" class="img-thumbnail">

<hr /><code>Thumbnails</code><hr />

<div class="row">
    <div class="col-sm-6 col-md-3">
        <a href="#" class="thumbnail">
            <img data-src="holder.js/100%x180" alt="...">
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="#" class="thumbnail">
            <img data-src="holder.js/100%x180" alt="...">
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="#" class="thumbnail">
            <img data-src="holder.js/100%x180" alt="...">
        </a>
    </div>
</div>

<hr /><code>Jumbotron</code><hr />

<div class="jumbotron">
    <h1>Hello, world!</h1>
    <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
</div>

<hr /><code>Alert</code><hr />

<div class="alert alert-success">Well done! You successfully read this important alert message.</div>
<div class="alert alert-info">Heads up! This alert needs your attention, but its not super important</div>
<div class="alert alert-warning">Warning! Best check yo self, youre not looking too good.</div>
<div class="alert alert-danger">Oh snap! Change a few things up and try submitting again.</div>

<hr /><code>Panels</code><hr />

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">
        Panel content
    </div>
</div>

<hr /><code>Well</code><hr />

<div class="well">Look, Im in a well!</div>

<hr /><code>Tabs</code><hr />

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li><a href="#home" data-toggle="tab">Home</a></li>
    <li><a href="#profile" data-toggle="tab">Profile</a></li>
    <li><a href="#messages" data-toggle="tab">Messages</a></li>
    <li><a href="#settings" data-toggle="tab">Settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="home">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede..</div>
    <div class="tab-pane" id="profile">Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus..</div>
    <div class="tab-pane" id="messages">Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</div>
    <div class="tab-pane" id="settings">Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna.</div>
</div>

<hr /><code>Alerts Dismiss</code><hr />

<div class="alert alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>Oh snap! You got an error!</h4>
    <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
    <p>
        <button type="button" class="btn btn-danger">Take this action</button>
        <button type="button" class="btn btn-default">Or do this</button>
    </p>
</div>

<hr /><code>Accordion</code><hr />


<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Collapsible Group Item #1
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Collapsible Group Item #2
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    Collapsible Group Item #3
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
</div>