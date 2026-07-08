<form action="{{ route('company_emp') }}" method="GET">

    <select
        name="company"
        onchange="this.form.submit()">

        <option value="">All Companies</option>

        <option value="Google">Google</option>

        <option value="Microsoft">Microsoft</option>

        <option value="Apple">Apple</option>

    </select>

</form>
