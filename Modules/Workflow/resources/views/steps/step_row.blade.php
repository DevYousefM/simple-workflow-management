<tr style="width:100%">
    <input type="hidden" name="steps[{{ $index }}][id]" value="{{ $step_id ?? '' }}">
    <td class="px-2" style="width:15%">
        <input type="text" class="form-control form-control-default short-input" name="steps[{{ $index }}][name]"
            value="{{ $name ?? '' }}">
    </td>
    <td class="px-2" style="width:15%">
        <input type="number" class="form-control form-control-default short-input"
            name="steps[{{ $index }}][order]" value="{{ $order }}">
    </td>
    <td class="px-2" style="width:15%">
        <select name="steps[{{ $index }}][department_id]" class="form-control">
            <option value="0" selected disabled>Select Department</option>

            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ old('department_id', $department_id ?? '') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </td>
    <td class="px-2 text-center" style="width:5%">
        <a href="#" class="remove remove-step" onclick="remove_step(event, {{ $step_id ?? null }})">
            <i class="uil uil-trash-alt text-danger"></i>
        </a>
    </td>
</tr>
