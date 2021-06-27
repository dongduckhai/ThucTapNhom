using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using QuanLiThuVien.Models.Common;
using QuanLiThuVien.Models.Function;
using QuanLiThuVien.Models.ViewModel;

namespace QuanLiThuVien.Areas.ADMIN.Controllers
{
    public class HomeAdminController : Controller
    {
        // GET: ADMIN/Home
        public ActionResult Index()
        {
            ViewBag.SLKH = new AdminFunction().SL_KH();
            ViewBag.SLSP = new AdminFunction().SL_SP();
            return View();
        }
        [ChildActionOnly]
        public PartialViewResult Header()
        {
            return PartialView();
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
        [ChildActionOnly]
        public ActionResult Menu()
        {
            ViewBag.ListTheLoai = new TheLoaiFunction().GetTheLoais();
            ViewBag.ListNXB = new NhaXuatBanFunction().GetNhaXuatBans();
            ViewBag.ListTacGia = new TacGiaFunction().GetTacGias();
            return PartialView();
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