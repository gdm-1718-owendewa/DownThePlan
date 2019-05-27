
    
    <h1>{{ $data['title'] }}</h1>
    <img src="{{ $data['filepath'] . '/' . $data['filename'] }}" style="max-width:300px; margin-top:2%;">     
    <h2>Algemeene info</h2>
    <h3>Zit onder de category {{  $data['category'] }}</h3>
	<p>{{ $data['content'] }}</p>
    <p>Gemaakt door {{ $data['creator'] }}</p>
    <p>Contact: {{  $data['email'] }}</p>
    <h2>Funding</h2>
    <p> Te behalen: {{ $data['goal'] }}</p>
    <p> Al behaald: {{ $data['funded'] }}</p>

