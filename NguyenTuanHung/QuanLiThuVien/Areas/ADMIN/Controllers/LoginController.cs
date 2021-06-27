using QuanLiThuVien.Areas.ADMIN.Models;
using QuanLiThuVien.Models.Common;
using QuanLiThuVien.Models.Function;
using QuanLiThuVien.Models.ViewModel;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace QuanLiThuVien.Areas.ADMIN.Controllers
{
    public class LoginController : Controller
    {
        // GET: ADMIN/Login
        public ActionResult Index()
        {
            return View();
        }
        public ActionResult Login()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Login(LoginModel model)
        {
            if (ModelState.IsValid)
            {
                var dao = new AdminFunction();
                var result = dao.Login(model.UserName, model.Password);
                if (result != 0 )
                {
                    var admin = dao.GetById(model.UserName);
                    var adminSession= new AdminLogin();
                    adminSession.UserName= admin.UserName;
                    adminSession.id = admin.id;
                    Session.Add(CommonConstant.ADMIN_SESSION, adminSession);

                    CommonConstant.ADMINNAME = adminSession;
                    return Redirect("/ADMIN");
                }
                else
                {
                    ModelState.AddModelError("", "Tài khoản không tồn tại");
                }
            }
            return View(model);
        }
        [ChildActionOnly]
        public PartialViewResult HeaderTop()
        {

            return PartialView();
        }
        public PartialViewResult HeaderMid()
        {

            return PartialView();
        }
        [ChildActionOnly]
        public PartialViewResult ShowCart()
        {
            var cart = (Cart)Session[CommonConstant.CartSession];
            var list = new List<CartItemModel>();
            if (cart != null)
            {
                list = cart.Lines.ToList();
            }
            return PartialView(list);
        }
        private const string CartSession = "CartSession";
        public RedirectToRouteResult XoaKhoiGio(int sachID)
        {
            var cart = (Cart)Session[CartSession];
            if (cart != null)
            {
                var list = cart.Lines.ToList();
                CartItemModel itemXoa = list.FirstOrDefault(m => m.sach.SachID == sachID);
                if (itemXoa != null)
                {
                    list.Remove(itemXoa);
                }
                Session[CartSession] = list;
            }
            // List<CartItemModel> giohang = Session["CartSession"] as List<CartItemModel>;
            return RedirectToAction("Index");
        }
    }

}