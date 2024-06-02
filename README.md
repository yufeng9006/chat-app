1，定义转换规则
需要的文件列表为：

2，将规则嵌入gpt中，例如
rules = """
转换规则：
1. 所有的英文单词需要转换为大写。
2. 日期格式从 DD-MM-YYYY 转换为 YYYY/MM/DD。
3. 数字需要加上逗号作为千位分隔符。
   """

def conversation_with_rules(input_text):
prompt = f"{rules}\n用户输入：{input_text}\n输出："
response = gpt_4_model(prompt)  # 替换为实际的调用GPT-4函数
return response


