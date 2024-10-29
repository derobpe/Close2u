namespace Close2u.Api.Models;

public class User
{
    public int Id { get; set; }
    public string Name { get; set; }
    public string Email { get; set; }
    public string IPassword_hash { get; set; }
    public string Role { get; set; }
    public string Is_verified { get; set; }
    public string Created_at { get; set; }
    public string Updated_at { get; set; }
    
}