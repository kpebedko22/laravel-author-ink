# Filter Package

- EloquentFilter
- CollectionFilter

## Usage

## Commands

To use prepared commands for creating filter's classes add the following line in `App/Console/Kernel.php`:

```php 
protected function commands()
{
    ...   
    
    $this->load(__DIR__ . '/../Packages/Filter/Commands');
    
    ...
}
```
