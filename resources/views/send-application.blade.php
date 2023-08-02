<div>
    <h3>Application</h3>
    <p>User: {{ $application['name'] }}</p>
    <p>Id: {{ $application['id'] }}</p>
    <p>Subject: {{ $application['subject'] }}</p>
    <p>Message: {{ $application['message'] }}</p>
    <a href="{{asset('storage/'. $application['file'])}}">File: {{ $application['file'] }}</a>
</div>
