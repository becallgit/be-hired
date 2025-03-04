<h2>CREACION DE PROYECTOS</h2>
<form id="projectForm" action="{{ route('project.save') }}" method="POST">
        @csrf
    

            <label>Empresa:</label>
            <select name="company" required>
                <option value="">Selecciona una empresa</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>

            <label>Nombre:</label>
            <input type="text" name="name">

            <label>Sede:</label>
            <select name="headquarters" required>
                <option value="">Selecciona un Centro de trabajo</option>
                @foreach($work_centers as $work_center)
                    <option value="{{ $work_center->id }}">
                        {{ $work_center->name }}
                    </option>
                @endforeach
            </select>

            <label>CECO:</label>
            <input type="text" name="ceco">

            <label>Responsable:</label>
            <select name="responsible" required>
                <option value="">Selecciona un Centro de trabajo</option>
                @foreach($responsibles as $responsible)
                    <option value="{{ $responsible->id }}">
                        {{ $responsible->username }}
                    </option>
                @endforeach
            </select>

            <label>Numero de Personas:</label>
            <input type="text" name="personal_count">

            <label>Fecha Inicio:</label>
            <input type="date" name="start_date">

            <label>Fecha Fin:</label>
            <input type="date" name="end_date">

            <button type="submit">GUARDAR</button>
</form>