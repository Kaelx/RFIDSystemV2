<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'parent_id',
    ];
    /**
     * Get the parent category (department for a program).
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the child categories (programs under a department).
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'department_id');
    }

    public function studentsByProgram()
    {
        return $this->hasMany(Student::class, 'program_id');
    }


    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }

    public function employeesByProgram()
    {
        return $this->hasMany(Employee::class, 'program_id');
    }

    public function employeesByPosition()
    {
        return $this->hasMany(Employee::class, 'position_id');
    }

    const TYPE_SCHOOL_DEPARTMENT = 'school_department';
    const TYPE_PROGRAM_COURSE = 'program_course';
    const TYPE_EMPLOYEE_POSITION = 'employee_position';
}
